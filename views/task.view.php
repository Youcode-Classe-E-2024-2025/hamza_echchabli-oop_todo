<?php
require_once('views/partials/header.php');
?>
<div class="cnt min-w-[400px]  w-[96%] lg:w-[1024px]  mx-auto mt-20 mb-28  overflow-x-auto p-3">
            <div class="content  items-start  gap-3 ">
               <h3 class="text-center text-2xl font-bold"><?=$task['status']?> : <?=$task['title']?></h3>
               <form action="" method='POST'>
                <input type="hidden" value="update-description" id="hidden" name="hidden">
               <textarea name="description" id="description" class=" bg-gray-400 text-center text-white w-full outline-none mt-5 min-h-24 max-h-24 p-5 font-semibold" ><?=$task['description']?></textarea>
               <button type="submit" class="bg-gray-400 hover:bg-gray-600 transition-colors w-full py-1 mt-1 mb-2 text-white">Update</button>
               </form>
               <p class="w-full mt-2 bg-slate-200 px-4 text-center font-semibold">Priority : <?=$task['priority']?></p>
               <p class="w-full mt-2 bg-slate-200 px-4 text-center font-semibold">Deadline : <?=$task['deadline']?></p>
               <p class="w-full mt-2 bg-slate-50 px-4 text-center font-semibold">Assignees : </p>
               <?php foreach($task['assignees'] as $assignee) :?>
                <div class="w-full mt-2 bg-slate-200 px-4 flex justify-between font-semibold items-center" >
                    <span><?=$assignee['user_name']?></span>
                    <span><?=$assignee['email']?></span>
                    <form action="" method="POST">
                    <input type="hidden" id="hidden" name="hidden" value="remove-assignee">
                    <input type="hidden" id="id" name="id" value="<?=$assignee['id']?>">

                    <button type="submit" class=" bg-red-500 rounded-full flex justify-center items-center w-5 h-5 ">-</button>
                    </form>
                </div>
                <?php endforeach ?>
                <button class="w-full btn-add-assignee mt-2 bg-slate-200 hover:bg-slate-400 transition-colors px-4 text-center text-2xl font-extrabold ">+</button>
                <form action="" method='POST' class="absolute form-add-assignee outline-none top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] bg-gray-600 shadow-md py-5 px-2 hidden">
                  <input type="hidden" id='hidden' name="hidden" value="add-assignee">
                  <select name="id" id="id" class="w-full">
                      <?php foreach($filteredUsers as $user) :?>
                          <option value="<?=$user['id']?>"><?=$user['user_name']?> - <?=$user['email']?></option>
                      <?php endforeach?>
                  </select>
                  <button type="submit" class="bg-gray-400 hover:bg-gray-600 transition-colors w-full py-1 mt-2 text-white">Add</button>
                  <button class="btn-close-assignee bg-gray-400 hover:bg-gray-600 transition-colors w-full py-1 mt-1 text-white">Close</button>
              </form>
            </div>
</div>

</body>

<script src="js/task.js"></script>
</html>