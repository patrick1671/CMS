<?php
function adminListcomponent($id,$en_title,$pl_title,$en_description,$pl_description,$photoPath,$premiereDate,$index){
        $img=base64_encode($photoPath);
 $adminList_template="
        <tr>
            <td>$index</td>
            <td><img width='50px' src='data:image/jpg;charset=utf8;base64,$img' /></td>
            
            <td>$en_title</td>
            <td>$pl_title</td>
            <td>$en_description</td>
            <td>$pl_description</td>
            <td>$premiereDate</td>
            <td>
                
                    <a href='movieEdit.php?name=$id' type='submit' class='btn btn-outline-secondary' name='$id' >Edit</a>
                    
                    <a href='movieDelete.php?name=$id' type='submit' class='btn btn-outline-danger' name='$id' >Del</a>
                
            </td>
        </tr>
";
echo $adminList_template;
}
?>