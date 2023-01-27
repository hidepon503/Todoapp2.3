<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/reset.css">
  <title>COACHTECH</title>
  <style>
    body {
      font-size:16px;
      background-color:#2D197C;
    }

    .container {
      width:100%;
      height: 600px;
      display:flex;
      justify-content:center;
      align-items:center;
    }

    .todolist {
      width: 60%;
      margin-top:20%;
      position: absolute;
      padding:20px;
      background-color:#ffffff;
      border-radius: 20px;
    }

    .todolist_headder {
      width: 100%;
      height:auto;
      display: flex;
      justify-content: space-between;
    }

    .todolist_headder_title{
      font-size:30px;
      font-weight:bold;
    }
    .todolist_headder_item {
      display: flex;
      margin-right:20px;
      align-items:center;
      justify-content: flex-end;
    }

     .todolist_headder_item_logout_button {
      width:120px;
      height: 35px;
      margin-left:20px;
      background-color:#FFFFFF;
      border-color:#FF8080;
      color:#FF8080;
      border-radius:5px;
      cursor:pointer;
      border:2px solid;
      transition: all  0.3s ease;
    }

    .todolist_headder_item_logout_button:hover{
      width:120px;
      height: 35px;
      margin-left:20px;
      background-color:#FF8080;
      border-color:#FFFFFF;
      color:#FFFFFF;
      border-radius:5px;
    }



    .todolist_find {
    }

    .todolist_warning {
      margin-left:5%;
    }

    .todolist_task-create-form{
      width: 65%;
      height: 30px;
      margin-left:5%;
      border-radius: 5px;
      border-color: #E6E6E6;
      border:2px solid;
    }

    .todolist_table-select-tag {
      width:5%;
      height: 40px;
      margin: 0 5% 0 5%;
      border-radius: 5px;
      border-color: #E6E6E6;
      text-align:center;
      border:2px solid;
    }
    
    .todolist_task-search-button {
      width:10%;
      height: 35px;
      background-color:#FFFFFF;
      border-color:#e181fb;
      color:#e181fb;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }

    .todolist_task-search-button:hover {
      width:10%;
      height: 35px;
      background-color:#e181fb;
      border-color:#FFFFFF;
      color:#FFFFFF;
      border-radius:5px;
      border:2px solid;
    }

    .todolist_table {
      margin-top:20px;
      width: 100%;
      text-align:center;
    }

    .todolist_table_edit_form {
      width:100%;
      height:25px;
      border-radius:5px;
      border-color: #E6E6E6;
      border:2px solid;
    }

    .todolist_table-select-tag{
      height:30px;
      width:60px;
      border-radius:5px;
      border-color: #E6E6E6;
      border:2px solid;
    }

    .todolist_table-edit-button{
      width:60px;
      height: 35px;
      background-color:#FFFFFF;
      border-color: #f99770;;
      color:#f99770;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }
    .todolist_table-edit-button:hover{
      width:60px;
      height: 35px;
      background-color:#F99770;
      border-color: #FFFFFF;
      color:#FFFFFF;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }

    .todolist_table-delete-button{
      width:60px;
      height: 35px;
      background-color:#FFFFFF;
      border-color:#88fbe0;
      color:#88fbe0;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }
    .todolist_table-delete-button:hover{
      width:60px;
      height: 35px;
      background-color:#88FBE0;
      border-color:#FFFFFF;
      color:#FFFFFF;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }

    .todolist_return_button{
      width:100px;
      height: 35px;
      margin: 0 0 1% 5%;
      background-color:#FFFFFF;
      border-color:B6B8B8;
      color:#B6B8B8;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }
    .todolist_return_button:hover{
      width:100px;
      height: 35px;
      margin: 0 0 1% 5%;
      background-color:#B6B8B8;
      border-color:#FFFFFF;
      color:#FFFFFF;
      border-radius:5px;
      border:2px solid;
      transition: all  0.3s ease;
    }


  </style>
</head>
<body>
  <div class="container">
      <div class="todolist">
        <div class="todolist_headder">
          <p class="todolist_headder_title">タスク検索</p>
          <div class="todolist_headder_item">
            <?php if(Auth::check()): ?>
              <p>「<?php echo e($user -> name); ?>」でログイン中</p>
            <?php endif; ?>
            <form action="/logout" method="post">
              <?php echo csrf_field(); ?>
              <input type=submit class="todolist_headder_item_logout_button" value="ログアウト">
            </form>            
          </div>
        </div>

        <!--検索フォーム-->

        <form action="search" class="todolist_task-create"  method="get">
          <!--<?php if(count($errors) > 0): ?>
           <ul class="todolist_warning">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="todolist_warning-title"><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          <?php endif; ?>
          getメソッドでリエイトや保存等のアクションを行わないのでバリデーションは不要
          -->
          <?php echo csrf_field(); ?>
            <input type="text" name="keyword" class="todolist_task-create-form"  >
            <select name="tag_id" class="todolist_table-select-tag">
              <option value=""></option>
              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
               <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!--<input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">-->

            <button class="todolist_task-search-button">検索</button>
        </form>

        <!--検索フォームここまで-->

         <table class="todolist_table">
               <tr>
                 <th class="todolist_table-date">作成日</th>
                 <th class="todolist_table-task">タスク名</th>
                 <th class="todolist_table-task">タグ</th>
                 <th class="todolist_table-create">更新</th>
                 <th class="todolist_table-delete">削除</th>
               </tr>
          
            <?php if(!empty($items)): ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--キーワードとタグの検索にヒットしたものを繰り返す-->
                <tr>
                      <td><?php echo e($item->created_at); ?></td>
                    <form action="/edit" class="" method="POST">
                      <?php echo csrf_field(); ?>
                      <td>
                        <input type="text" class="todolist_table_edit_form"  name="name" value="<?php echo e($item->name); ?>" >
                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>"> 
                      </td>
                      <td>
                          <select name="tag_id" id="tag_id" class="todolist_table-select-tag" >
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($tag->id); ?>" <?php if($tag->id == old('tag_id', $item['tag_id'])): ?> selected <?php endif; ?>>
                                <?php echo e($tag->name); ?>

                              </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                          </select>
                      </td>
                      <td>
                        <button class="todolist_table-edit-button">更新</button>
                      </td>
                    </form>
                      <td>
                        <form action="/delete" method="POST">
                          <?php echo csrf_field(); ?>
                          <input type="hidden" name="id" value="<?php echo e($item->id); ?>"> 
                          <button class="todolist_table-delete-button">削除</button>
                        </form>                    
                      </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endif; ?>
        </table>
        <a href="/" class="todolis_return">
          <button class="todolist_return_button">戻る</button>
        </a> 
      </div>
  </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\todopj\resources\views/search.blade.php ENDPATH**/ ?>