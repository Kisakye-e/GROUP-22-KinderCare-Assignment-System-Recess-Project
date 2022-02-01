<?php include_once 'layout.php';?>
<html>
<head>
<style>
    
    .well{
        background-color:#0275d8;
        color:white;
        border-radius:5px;
        padding-left: 5px;
        /* text-align:centre; */
    }
    
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    
    
</style>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>


<body>
    <div class="row" style="margin-top:40px;">
        <!-- <div class="col-sm-3">
          <div class="well">
            <h4>Assignments</h4>
            <p>1 Million</p> 
          </div>
        </div> -->
        <div class="col-sm-4">
          <div class="well">
            <h4>Registered pupils</h4>
            <p>19</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Deactivated Pupils</h4>
            <p>6</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Pending Activation Requests</h4>
            <p>3</p> 
          </div>
        </div>
  </div>


  @if(Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  @endif
  <br/>
  <h4>Registered Pupils</h4>
  <br/>
  <table class="table" id="pupil_table">
  <thead>
    <tr>
      <th scope="col">User Code</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Activation Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row"> {{$item -> userCode }}</th>
      <td>{{$item -> firstName }}</td>
      <td>{{$item -> lastName }}</td>
      <td>{{$item -> phoneNumber }}</td>
      <td>

        <input data-id="{{$item->userCode}}" class="toggle-class" type="checkbox"  
        data-onstyle="success" 
        data-offstyle="danger" data-toggle="toggle" data-on="Actived" data-off="Deactivated"
       {{ $item -> activationStatus ? 'checked' : '' }}>
       
  </td>
    </tr>
@endforeach
  </tbody>
</table>
  
 
<!-- <div class="container-fluid" id="display">
  <div class="row content">    
    <div class="col-sm-12">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Some text..</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Assignments</h4>
            <p>1 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Registered pupils</h4>
            <p>100 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Deactivated Pupils</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pending Activation Requests</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
      <div class="row" id="graphs">
        
        <div class="col-sm-5">
          <div class="well">
            <p>Student performance graph</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-5">
          <div class="well">
            <p>Change in registration</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
</body>
</html>
