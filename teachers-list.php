<div class="mx-auto py-10">
    <!-- Sezione di filtro -->
    <!-- <input type="text" id="authorFilter" onkeyup="filterAuthors()" placeholder="Cerca per nome" class="border p-2 mb-6 w-full md:w-1/2"> -->
    
    <div id="authorsList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4 w-full">
        <?php
        // $authors = get_users(array('who' => 'authors'));
        $teachers = get_users(array('role' => 'teacher'));
        foreach ($teachers as $teacher) :
            // $teacherUrl = "/teacher/" . $teacher->slug;
            $teacherUrl = get_author_posts_url($teacher->ID);
        ?>
            <div class="author-card p-4 text-center cursor-pointer" onclick="window.location.href='<?php echo $teacherUrl; ?>';">
                <!-- <img src="<?php echo pods_image_url($teacher->profile_picture, 'large'); ?>" alt="author profile image" class="w-40 h-40 rounded-full -mt-20 object-cover object-center border-4 border-white" /> -->
                <div class="w-full" style="padding-top: 100%; position: relative;">
                    <div class="absolute top-0 left-0 w-full h-full rounded-full overflow-hidden" style="background-image: url('<?php echo pods_image_url($teacher->profile_picture, 'large'); ?>'); background-size: cover; background-position: center;"></div>
                </div>



                <b class="text-sm text-black mb-2 "><?php echo $teacher->display_name; ?></b>
                <span class="inline-block text-sm text-black mb-2">
                    <?php  if ($teacher->level != "None") {
                        echo str_replace("Teacher", "", $teacher->level);
                    }?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function filterAuthors() {
    var input, filter, authorCards, authorName, i;
    input = document.getElementById('authorFilter');
    filter = input.value.toUpperCase();
    authorCards = document.getElementsByClassName('author-card');

    for (i = 0; i < authorCards.length; i++) {
        authorName = authorCards[i].getElementsByTagName('h2')[0];
        if (authorName.innerHTML.toUpperCase().indexOf(filter) > -1) {
            authorCards[i].style.display = "";
        } else {
            authorCards[i].style.display = "none";
        }
    }
}
</script>
