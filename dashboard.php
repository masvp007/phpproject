<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <title>VEHICLE</title>
</head>
<body>
<div class=container style="align:center">    
    <label for=""><h2 >No:of Vehicles:</h2></label>
    <?php
        include('connection.php');
        $count = mysqli_num_rows(mysqli_query($conn,"select * from vehicle"));
        echo "<h1 class='display-1 ' >$count</h1>";    
    ?>
</div>

<div class="container mt-5">
    <div class="row">
        <form action="" id="vform">
            <h4 class=" ">ADD Vehicles</h4>

            <div>
            <input type="text" class="form-control"  id="vid" style="display:none;" />    
                <label for="vreg" class="form-label">Registration Number</label>
                <input type="text" class="form-control" name="registration_number" id="vreg">
            </div>
            <div>    
                <label for="vcap" class="form-label">Seating Capacity</label>
                <input type="number" class="form-control" name="seating_capacity" id="vcap">
            </div>
            <div>    
                <label for="vdate" class="form-label">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" id="vdate">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" id="btnadd">Add</button>
            </div>
            <div id="msg"></div>
        </form>

        <div class="col-sm-7 text-center">
            <h3 class="alert-warning p-2">Vehicles List</h3>
            <table class="table ">
                <thead class="thead-dark">
                    <tr>
                        <th >ID</th>
                        <th scope = "col">Registration number</th>
                        <th scope = "col">Seating Capacity</th>
                        <th scope = "col">Purchase Date</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody" >


                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

<script>
$(document).ready(function(){
    output = "";
    
    //retrieve
    function showdata(){
        $.ajax({
            url :"view.php",
            method:"GET",
            dataType:"json",
            success:function(data){
                // console.log(data)

            for(i=0;i<data.length;i++){
                output += "<tr><td>" + data[i].id +"</td><td>" + data[i].registration_number +
                "</td><td>"+ data[i].seating_capacity + "</td><td>"+ data[i].purchase_date +
                "</td><td> <button class='btn btn-warning btn-edit'  data-sid =" + data[i].id +
                ">Update</button></td><td> <button class='btn btn-danger btn-del' data-sid =" + 
                data[i].id + ">Delete</button></td> </tr>"
            }
            $("#tbody").html(output);

            }
        })
    }
    showdata();



    //ajax request for add vehicle
    $("#btnadd").click(function(e){
    e.preventDefault();
    console.log("Saved")
    let vid = $("#vid").val();
    let vreg = $("#vreg").val();
    let vcap = $("#vcap").val();
    let vdate = $("#vdate").val();

    // console.log(vreg)
    // console.log(vcap)
    // console.log(vdate)
    mydata = {
        id:vid,
        registration_number:vreg,
        seating_capacity:vcap,
        purchase_date:vdate
    }
    // console.log(mydata)
    $.ajax({
        url:"add.php",
        method:"POST",
        data:JSON.stringify(mydata),
        success:function(data){
            msg = "<div >"+ data + "</div>";
            $("#msg").html(msg);
            $("#vform")[0].reset();
            location.reload();
        },
    })

    });
//ajax delete

$("tbody").on("click",".btn-del",function(){
    console.log("delete button clicked");
    let id = $(this).attr("data-sid")
    // console.log(id);
    mydata = {sid:id}
    vthis = this;
    $.ajax({
        url:"delete.php",
        method:"POST",
        data:JSON.stringify(mydata),
        success:function(data){
            // console.log(data);
            msg = "<div >"+ data + "</div>";
            $("#msg").html(msg);
            $(vthis).closest("tr").fadeOut(); 
        },
    })

});

//ajax update
$("tbody").on("click",".btn-edit",function(){
    console.log("update button clicked");
    let id = $(this).attr("data-sid")
    // console.log(id);
    mydata = {sid:id};
    $.ajax({
        url:"update.php",
        method:"POST",
        dataType:"json",
        data:JSON.stringify(mydata),
        success:function(data){
            // console.log(data.id);
            $("#vid").val(data.id);
            $("#vreg").val(data.registration_number);
            $("#vcap").val(data.seating_capacity);
            $("#vdate").val(data.purchase_date);
        }  




    })
});

});    
    
    
</script>

</html>
