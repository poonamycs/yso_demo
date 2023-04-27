@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/kanban.css')}}">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700,800,900" rel="stylesheet"> -->
@endsection

@section('content')
    <div id="loadingScreen">
        <div class="loader"></div>
    </div>
    <div class="controls p-3">
        <form action="javascript:void(0)" class="form-inline" method="post" id="kanbanForm">@csrf
            <label for="titleInput">Title:</label>
            <input class="form-control form-control-sm" type="text" name="title" id="titleInput">
            <label for="descriptionInput">Description:</label>
            <input class="form-control form-control-sm" type="text" name="description" id="descriptionInput">
            <button type="submit" class="btn btn-dark" id="add">Add</button>
            <button class="btn btn-danger mx-2" id="deleteAll">Delete All</button>
            <!-- <button class="btn" id="theme-btn">Dark/Light</button> -->
        </form>
    </div>
    <div class="boards overflow-auto p-0" id="boardsContainer">
    </div>
@endsection

@section('scripts')
    <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    {{-- <script src="{{asset('assets/js/kanban.js')}}" defer></script> --}}
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <script>if (window.module) module = window.module;</script>
    <script>
        $(document).ready(function(){
            // alert('ok'); return false();
            //variables
            let cardBeignDragged;
            let dropzones = document.querySelectorAll('.dropzone');
            let priorities;
            // let cards = document.querySelectorAll('.kanbanCard');
            let dataColors = [
                {color:"red", title:"backlog"},
                {color:"yellow", title:"to do"},
                {color:"blue", title:"in progress"},
                {color:"purple", title:"testing"},
                {color:"green", title:"done"}
            ];
            let dataCards = {
                config:{
                    maxid:0
                },
                cards:[]
            };
            let theme = "light";
            //initialize

            $(document).ready(()=>{
                
                $("#loadingScreen").addClass("d-none");
                theme = localStorage.getItem('@kanban:theme');
                if(theme){
                    $("body").addClass(`${theme==="light"?"":"darkmode"}`);
                }
                initializeBoards();
                if(JSON.parse(localStorage.getItem('@kanban:data'))){
                    dataCards = JSON.parse(localStorage.getItem('@kanban:data'));
                    // console.table(dataCards);
                    console.table({!!$cards!!});
                    initializeComponents(dataCards);
                }
                initializeCards();
                $('#add').click(()=>{
                    const title = $('#titleInput').val()!==''?$('#titleInput').val():null;
                    const description = $('#descriptionInput').val()!==''?$('#descriptionInput').val():null;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url:'/add-task/',
                        data:{
                            title:title,
                            description:description,
                        },
                        beforeSend: function(){
                            $('#add').html('Adding...');
                        },
                        success:function(resp){
                            if(resp=="200"){
                                $("#add").html("<font color='red' style='font-size: 13px;'>Add</font>");
                            }
                        },error:function(){
                            alert("Error");
                        },complete:function(){
                            $('#add').html('Add');
                        }
                    });

                    $('#titleInput').val('');
                    $('#descriptionInput').val('');
                    if(title && description){
                        let id = dataCards.config.maxid+1;
                        const newCard = {
                            id,
                            title,
                            description,
                            position:"red",
                            priority: false
                        }
                        dataCards.cards.push(newCard);
                        dataCards.config.maxid = id;
                        save();
                        appendComponents(newCard);
                        initializeCards();

                        // ajax call
                    }
                });
                $("#deleteAll").click(()=>{
                    dataCards.cards = [];
                    save();
                });
                $("#theme-btn").click((e)=>{
                    e.preventDefault();
                    $("body").toggleClass("darkmode");
                    if(theme){
                        localStorage.setItem("@kanban:theme", `${theme==="light"?"darkmode":""}`)
                    }
                    else{
                        localStorage.setItem("@kanban:theme", "darkmode")
                    }
                });
            });

            //functions
            function initializeBoards(){    
                dataColors.forEach(item=>{
                    let htmlString = `
                    <div class="board">
                        <h3 class="text-center">${item.title.toUpperCase()}</h3>
                        <div class="dropzone" id="${item.color}">
                            
                        </div>
                    </div>
                    `
                    $("#boardsContainer").append(htmlString)
                });
                let dropzones = document.querySelectorAll('.dropzone');
                dropzones.forEach(dropzone=>{
                    dropzone.addEventListener('dragenter', dragenter);
                    dropzone.addEventListener('dragover', dragover);
                    dropzone.addEventListener('dragleave', dragleave);
                    dropzone.addEventListener('drop', drop);
                });
            }

            function initializeCards(){
                cards = document.querySelectorAll('.kanbanCard');
                
                cards.forEach(card=>{
                    card.addEventListener('dragstart', dragstart);
                    card.addEventListener('drag', drag);
                    card.addEventListener('dragend', dragend);
                });
            }

            function initializeComponents(dataArray){
                //create all the stored cards and put inside of the todo area
                dataArray.cards.forEach(card=>{
                    appendComponents(card); 
                })
            }

            function appendComponents(card){
                //creates new card inside of the todo area
                let htmlString = `
                    <div id=${card.id.toString()} class="kanbanCard ${card.position}" draggable="true">
                        <div class="content">               
                            <h4 class="title">${card.title}</h4>
                            <p class="description">${card.description}</p>
                        </div>
                        <form class="row mx-auto justify-content-between d-flex">
                            <span id="span-${card.id.toString()}" onclick="togglePriority(event)" class="fa fa-star priority w-50 ${card.priority? "is-priority": ""}"></span>
                            <button class="invisibleBtn w-50">
                                <span class="fa fa-trash delete" onclick="deleteCard(${card.id.toString()})"></span>
                            </button>
                        </form>
                    </div>
                `
                $(`#${card.position}`).append(htmlString);
                priorities = document.querySelectorAll(".priority");
            }

            function togglePriority(event){
                event.target.classList.toggle("is-priority");
                dataCards.cards.forEach(card=>{
                    if(event.target.id.split('-')[1] === card.id.toString()){
                        card.priority=card.priority?false:true;
                    }
                })
                save();
            }

            function deleteCard(id){
                dataCards.cards.forEach(card=>{
                    if(card.id === id){
                        let index = dataCards.cards.indexOf(card);
                        console.log(index)
                        dataCards.cards.splice(index, 1);
                        console.log(dataCards.cards);
                        save();
                    }
                })
            }


            function removeClasses(cardBeignDragged, color){
                cardBeignDragged.classList.remove('red');
                cardBeignDragged.classList.remove('blue');
                cardBeignDragged.classList.remove('purple');
                cardBeignDragged.classList.remove('green');
                cardBeignDragged.classList.remove('yellow');
                cardBeignDragged.classList.add(color);
                position(cardBeignDragged, color);
            }

            function save(){
                localStorage.setItem('@kanban:data', JSON.stringify(dataCards));
            }

            function position(cardBeignDragged, color){
                const index = dataCards.cards.findIndex(card => card.id === parseInt(cardBeignDragged.id));
                dataCards.cards[index].position = color;
                save();
            }

            //cards
            function dragstart(){
                dropzones.forEach( dropzone=>dropzone.classList.add('highlight'));
                this.classList.add('is-dragging');
            }

            function drag(){
                
            }

            function dragend(){
                dropzones.forEach( dropzone=>dropzone.classList.remove('highlight'));
                this.classList.remove('is-dragging');
            }

            // Release cards area
            function dragenter(){

            }

            function dragover({target}){
                this.classList.add('over');
                cardBeignDragged = document.querySelector('.is-dragging');
                if(this.id ==="yellow"){
                    removeClasses(cardBeignDragged, "yellow");
                    
                }
                else if(this.id ==="green"){
                    removeClasses(cardBeignDragged, "green");
                }
                else if(this.id ==="blue"){
                    removeClasses(cardBeignDragged, "blue");
                }
                else if(this.id ==="purple"){
                    removeClasses(cardBeignDragged, "purple");
                }
                else if(this.id ==="red"){
                    removeClasses(cardBeignDragged, "red");
                }
                
                this.appendChild(cardBeignDragged);
            }

            function dragleave(){
              
                this.classList.remove('over');
            }

            function drop(){
                this.classList.remove('over');
            }
        });
    </script>
@endsection
