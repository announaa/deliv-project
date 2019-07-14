@extends('layouts.template')

@section('content')
    <div class="container">
<form action="/postdelguy" method="POST">
    @csrf
    <label for="vehicle" style="margin:15px;"><span style="margin-bottom:15px;"> What type of vehicle you own :</span></label>
    <select name="vehicle" id="veh" class="select" style="margin:15px;">
        <option value="car">car</option>
        <option value="motocycle">motocycle</option>
    </select><br>
    <label for="startdate" style="margin:15px;">What date can you start :</label> 
    <input type="date" name="startdate" class="input" style="margin:15px;"><br>
    <div style="margin:15px;" class="container">
    <table border="0" aria-rowspan="10"><thead><tr><td><label for="availability"> Availability : </label></td><td id="checklabel" colspan="2" style="padding:15px">Check all :</td><td><input type="checkbox" class="inputcheck "  id="alldguy" style="margin:15px;"></td></tr></thead>
       <tbody>
        <tr><td style="padding:15px">monday</td><td>   <input type="checkbox" class="inputcheck avdate " name="monday"  id="mon" style="margin:15px;"></td><td><input type="time" name="monfrom" disabled value="null"  style="margin:15px;" class="input" id="monfrom"  ></td><td><input type="time" name="monto" disabled value="null"  style="margin:15px;" class="input" id="monto"  ></td></tr>
        
        <tr><td style="padding:15px">tuesday</td><td>  <input type="checkbox" class="inputcheck avdate " name="tuesday"  id="tues" style="margin:15px;"></td><td><input type="time" name="tuesfrom" disabled value="null"  style="margin:15px;" class="input" id="tuesfrom"  ></td><td><input type="time" name="tuesto" disabled value="null"  style="margin:15px;" class="input" id="tuesto"  ></td></tr>
        
        <tr><td style="padding:15px">wednesday</td><td><input type="checkbox" class="inputcheck avdate " name="wednesday"  id="wednes" style="margin:15px;"></td><td><input type="time" name="wednesfrom" disabled value="null"  style="margin:15px;" class="input" id="wednesfrom"  ></td><td><input type="time" name="wednesto" disabled value="null"  style="margin:15px;" class="input" id="wednesto"  ></td></tr>
        
        <tr><td style="padding:15px">thursday</td><td> <input type="checkbox" class="inputcheck avdate " name="thursday"  id="thurs" style="margin:15px;"></td><td><input type="time" name="thursfrom" disabled value="null"  style="margin:15px;" class="input" id="thursfrom"  ></td><td><input type="time" name="thursto" disabled value="null"  style="margin:15px;" class="input" id="thursto"  ></td></tr>
        
        <tr><td style="padding:15px">friday</td><td>   <input type="checkbox" class="inputcheck avdate " name="friday"  id="fri" style="margin:15px;"></td><td><input type="time" name="frifrom" disabled value="null"  style="margin:15px;" class="input" id="frifrom"  ></td><td><input type="time" name="frito" disabled value="null"  style="margin:15px;" class="input" id="frito"  ></td></tr>
        
        <tr><td style="padding:15px">saturday</td><td> <input type="checkbox" class="inputcheck avdate " name="saturday"  id="satur" style="margin:15px;"></td><td><input type="time" name="saturfrom" disabled value="null"  style="margin:15px;" class="input" id="saturfrom"  ></td><td><input type="time" name="saturto" disabled value="null"  style="margin:15px;" class="input" id="saturto"  ></td></tr>
        
        <tr><td style="padding:15px">sunday</td><td>   <input type="checkbox" class="inputcheck avdate " name="sunday"  id="sun" style="margin:15px;"></td><td><input type="time" name="sunfrom" disabled value="null"  style="margin:15px;" class="input" id="sunfrom"  ></td><td><input type="time" name="sunto" disabled value="null"  style="margin:15px;" class="input" id="sunto"  ></td></tr></tbody>
        
        <tfoot><tr><td><input type="submit" name="submit" id="" style="margin:20px;" class="primary-btn"></td></tr></tfoot>
    </table>
</form>
</div>

@endsection