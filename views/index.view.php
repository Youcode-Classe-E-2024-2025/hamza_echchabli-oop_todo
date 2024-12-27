<?php
require_once('views/partials/header.php');
?>
    <nav class="w-full text-white bg-gray-700 flex justify-between relative">
    <div class="prj-cnt">
    <button class="btn-prj  py-1 px-2 font-extralight text-gray-400 hover:text-white transition-colors">project</button>
    <ul class="prj-list absolute top-full left-0 ">
        <li><button class="btn-save-tasks font-extralight text-gray-400 hover:text-white transition-colors pl-2  bg-gray-500 w-44 text-start">save (ctrl+s)</button></li>
    </ul>
    </div>
    
    <p class="py-1 px-2 font-extralight text-gray-400">Don't forget to save (ctrl+s)</p>
    </nav>
    <p class="absolute top-0 left-1/2 translate-x-[-50%] py-1 px-2 font-extralight text-green-400 text-center">saved</p>
    <main class="relative">
        <!-- <h1 class="mx-auto my-7 text-4xl w-fit font-extrabold bg-gradient-to-r from-orange-500 to-purple-500 bg-clip-text text-transparent">
            Kanban
        </h1> -->
        <div class="cnt min-w-[400px]  w-[96%] lg:w-[1024px]  mx-auto mt-20 mb-28  overflow-x-auto p-3">
            <div class="content flex items-start  gap-3 ">
               <div class="relative transition-all list-container mx-auto basis-72 min-w-60 bg-[#262626] rounded flex flex-col gap-5 p-3">
                <div class="flex flex-col absolute right-0 top-0 text-white text-sm gap-1 p-1">
                    
                    <button class="btn-sortpr bg-orange-600/20 px-2 rounded hover:bg-orange-500 transition-all">priority</button>
                    <button class="btn-sortdl bg-red-600/20 px-2 rounded hover:bg-red-500 transition-all">deadline</button>
                </div>
                <h2 class="  list-title text-white pl-3 font-semibold tracking-wider text-lg">To do</h2>
                <ul class="  list     flex flex-col  gap-5 " id="todo">
                    
                </ul>
                <button data-name="todo" class="btn-addtask transition-all  bg-[#353535] rounded flex justify-center items-center  text-3xl text-white hover:bg-[#646464]" draggable="true">+</button>
               </div>
               <div class="relative transition-all list-container mx-auto basis-72 min-w-60 bg-[#262626] rounded flex flex-col gap-5 p-3">
                <div class="flex flex-col absolute right-0 top-0 text-white text-sm gap-1 p-1">
                    
                    <button class="btn-sortpr bg-orange-600/20 px-2 rounded hover:bg-orange-500 transition-all">priority</button>
                    <button class="btn-sortdl bg-red-600/20 px-2 rounded hover:bg-red-500 transition-all">deadline</button>
                </div>
                <h2 class="  list-title text-white pl-3 font-semibold tracking-wider text-lg">doing</h2>
                <ul class="  list     flex flex-col  gap-5 " id="doing">
                    
                </ul>
                <button data-name="doing" class="btn-addtask transition-all  bg-[#353535] rounded flex justify-center items-center  text-3xl text-white hover:bg-[#646464]" draggable="true">+</button>
               </div>
               <div class="relative transition-all list-container mx-auto basis-72 min-w-60 bg-[#262626] rounded flex flex-col gap-5 p-3">
                <div class="flex flex-col absolute right-0 top-0 text-white text-sm gap-1 p-1">
                    
                    <button class="btn-sortpr bg-orange-600/20 px-2 rounded hover:bg-orange-500 transition-all">priority</button>
                    <button class="btn-sortdl bg-red-600/20 px-2 rounded hover:bg-red-500 transition-all">deadline</button>
                </div>
                <h2 class="  list-title text-white pl-3 font-semibold tracking-wider text-lg">Review</h2>
                <ul class="  list     flex flex-col  gap-5 " id="review">
                    
                </ul>
                <button data-name="review" class="btn-addtask transition-all  bg-[#353535] rounded flex justify-center items-center  text-3xl text-white hover:bg-[#646464]" draggable="true">+</button>
               </div>
               <div class="relative transition-all list-container mx-auto basis-72 min-w-60 bg-[#262626] rounded flex flex-col gap-5 p-3">
                <div class="flex flex-col absolute right-0 top-0 text-white text-sm gap-1 p-1">
                    
                    <button class="btn-sortpr bg-orange-600/20 px-2 rounded hover:bg-orange-500 transition-all">priority</button>
                    <button class="btn-sortdl bg-red-600/20 px-2 rounded hover:bg-red-500 transition-all">deadline</button>
                </div>
                <h2 class="  list-title text-white pl-3 font-semibold tracking-wider text-lg">Done</h2>
                <ul class="  list  flex flex-col  gap-5 " id="done">
                    
                </ul>
                <button data-name="done" class="btn-addtask transition-all  bg-[#353535] rounded flex justify-center items-center  text-3xl text-white hover:bg-[#646464]" draggable="true">+</button>
               </div>
               
            </div>
        </div>
        <form action="" class="hidden modal absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] z-2 min-w-28 min-h-28 rounded-md  flex-col px-10 py-4 gap-5 bg-[#242424] shadow-sm shadow-[#535353] ">
            <h3 class="text-white text-lg text-center">Todo</h3>
            <div class="flex flex-col gap-1">
                <label for="" class="text-white">Enter title : </label>
                <input placeholder="enter task title" type="text" class="title pl-2">
            </div>
            <div class="flex flex-col gap-2">
                <label for="deadline" class=" text-white">Enter dead line :</label>
                <input placeholder="enter deadline" type="date" class="deadline pl-2">
            </div>
            
            <div class=" flex justify-between">
                <label for="select" class=" text-white">Select Priority :</label>
                <select  class="priority">
                    <option value="0">p1</option>
                    <option value="1">p2</option>
                    <option value="2">p3</option>
                </select>
            </div>
            <button class="form-btn cursor-pointer py-1 px-2 bg-slate-500 hover:bg-slate-300 rounded-md">Add Task</button>
        </form>
        <form class=" description-form absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] z-2 min-w-28 min-h-28 rounded-md hidden flex-col items-center px-10 py-4 gap-5 bg-[#242424] shadow-sm shadow-[#535353] ">
            <label class="text-white">Description :</label>
            <textarea  class="w-[100%] max-w-[100%] max-h-14 min-h-8 bg-slate-300"></textarea>
            <button class="bg-slate-300  px-1 text-slate-950 hover:bg-slate-50">save</button>
        </form>
    </main>  
      
</body>

<script src="display.js"></script>
<script src="js/getdata.js"></script>
</html>