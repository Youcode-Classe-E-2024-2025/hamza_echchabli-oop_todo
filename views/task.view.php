<?php
require_once('views/partials/header.php');
?>
<div class="cnt min-w-[400px]  w-[96%] lg:w-[1024px]  mx-auto mt-20 mb-28  overflow-x-auto p-3">
            <div class="content  items-start  gap-3 ">
               <h3 class="text-center text-2xl font-bold"><?=$task['status']?> : <?=$task['title']?></h3>
               <textarea name="description" id="description" class=" bg-gray-400 text-center text-white w-full outline-none mt-5 min-h-24 max-h-24 p-5 font-semibold" disabled><?=$task['description']?>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi ducimus asperiores eaque illum debitis animi a corrupti dignissimos voluptatem non? Exercitationem recusandae, non culpa neque maiores perferendis quas itaque voluptate.</textarea>
               <p class="w-full mt-2 bg-slate-200 px-4 text-center font-semibold">Priority : <?=$task['priority']?></p>
               <p class="w-full mt-2 bg-slate-200 px-4 text-center font-semibold">Deadline : <?=$task['deadline']?></p>
               <p class="w-full mt-2 bg-slate-50 px-4 text-center font-semibold">Assignees : </p>
               <?php foreach($task['assignees'] as $assignee) :?>
                <div class="w-full mt-2 bg-slate-200 px-4 flex justify-between font-semibold items-center" >
                    <span><?=$assignee['user_name']?></span>
                    <span><?=$assignee['email']?></span>
                    <button class=" bg-red-500 rounded-full flex justify-center items-center w-5 h-5 ">-</button>
                </div>
                <?php endforeach ?>
                <button class="w-full mt-2 bg-slate-200 hover:bg-slate-400 transition-colors px-4 text-center text-2xl font-extrabold ">+</button>
            </div>