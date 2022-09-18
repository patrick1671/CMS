<?php
function component($title,$description,$photoPath,$premiereDate){
    
    $img=base64_encode($photoPath);
     $product_template="

    <div class='movie-container'>
    <h3>$title</h3>
    <div>
    <img src='data:image/jpg;charset=utf8;base64,$img' />
           
    
    </div>
    <p>$description</p>
    <span class='premiere-date'>$premiereDate</span>
    </div>
";
echo $product_template;
}
?>