<?php include_once 'layout.php';?>
<style>


.child {
  margin-left:150px;

}
td {
    /* background-color: #057DCD; */
    border: 1px;
}

div p {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.flex-container > div {
  /* background-color: #f1f1f1; */
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
.tab{
   margin-left:100px;
}
table{
    border:1px;
}
td{
    width:100px;
    height:80px;
    font-size:50px;
    
}
</style>

<script>
    function printChar() {
               var items = document.getElementsByName("character[]");
               var selectedItems = "";
               for (var i = 0; i < items.length; i++) {
                   if (items[i].type == "checkbox" && items[i].checked == true) 
                   selectedItems += items[i].value + "\n";
               }
               document.getElementById("char").innerHTML=""+ selectedItems;
               
           }
           check = function (j) {
               var total = 0;
               var chars = document.getElementsByName('character[]');
               for (var i = 0; i < chars.length; i++) {
                   if (chars[i].checked) {
                       total = total + 1;
                   }
                   if (total > 8) {
                       alert("Please select not more than 8 characters ");
                       chars[i].checked = false;
                       return false;
                   }
               }
           }
</script>


  <div class='child'>
</br>
        <form action = "" method="POST">
            <p style="font-size:25px;">SELECT CHARACTERS TO ADD TO THE ASSIGNMENT:</p>
            <p id="char"></p>
            <br>
            <div class="tab">
            <table>
                <tr>
                    <td>A<input type="checkbox" id="character" name="character[]" value="A" onclick='check(25)'></td>
                    <td>B<input type="checkbox" id="character" name="character[]" value="B" onclick='check(24)'></td>
                    <td>C<input type="checkbox" id="character" name="character[]" value="C" onclick='check(23)'></td>
                    <td>D<input type="checkbox" id="character" name="character[]" value="D" onclick='check(22)'></td>
                    <td>E<input type="checkbox" id="character" name="character[]" value="E" onclick='check(21)'></td>
                    <td>F<input type="checkbox" id="character" name="character[]" value="F" onclick='check(20)'></td>
                    <td>G<input type="checkbox" id="character" name="character[]" value="G" onclick='check(19)'></td>
                </tr>
                <tr>
                    
                    <td>H<input type="checkbox" id="character" name="character[]" value="H" onclick='check(18)'></td>
                    <td>I<input type="checkbox" id="character" name="character[]" value="I" onclick='check(17)'></td>
                    <td>J<input type="checkbox" id="character" name="character[]" value="J" onclick='check(16)'></td>
                    <td>K<input type="checkbox" id="character" name="character[]" value="K" onclick='check(15)'></td>
                    <td>L<input type="checkbox" id="character" name="character[]" value="L" onclick='check(14)'></td>
                    <td>M<input type="checkbox" id="character" name="character[]" value="M" onclick='check(13)'></td>
                    <td>N<input type="checkbox" id="character" name="character[]" value="N" onclick='check(12)'></td>
                </tr>
                <tr>
                    
                
                    <td>O<input type="checkbox" id="character" name="character[]" value="O" onclick='check(11)'></td>
                    <td>P<input type="checkbox" id="character" name="character[]" value="P" onclick='check(10)'></td>
                    <td>Q<input type="checkbox" id="character" name="character[]" value="Q" onclick='check(9)'></td>
                    <td>R<input type="checkbox" id="character" name="character[]" value="R" onclick='check(8)'></td>
                    <td>S<input type="checkbox" id="character" name="character[]" value="S" onclick='check(7)'></td>
                    <td>T<input type="checkbox" id="character" name="character[]" value="T" onclick='check(6)'></td>
                    <td>U<input type="checkbox" id="character" name="character[]" value="U" onclick='check(5)'></td>
                </tr>
                <tr>           
                    <td>V<input type="checkbox" id="character" name="character[]" value="V" onclick='check(4)'></td>
                    <td>W<input type="checkbox" id="character" name="character[]" value="W" onclick='check(3)'></td>
                    <td>X<input type="checkbox" id="character" name="character[]" value="X" onclick='check(2)'></td>
                    <td>Y<input type="checkbox" id="character" name="character[]" value="Y" onclick='check(1)'></td>
                    <td>Z<input type="checkbox" id="character" name="character[]" value="Z" onclick='check(0)'></td>
                
                </tr>
            </table>
            </div>
            <br>
            <p>Teacher Code&emsp;<input type="text"></p></br></br>
            <p>Start Date &emsp;<input type="Date">&emsp;&emsp;Start time&emsp;<input type="time"></p></br></br> 
            <p>Close time &emsp;<input type="time">&emsp;&emsp; <button onclick="printChar()" name="submit" type="submit">Submit Assignment</button></br> </br>         
        </form>
  </div>
        

