<?php
    // so convert this to an array and build a drop down
    $country_list = $country_list ?? '';
    $co = json_decode($country_list,true);
    $countries = $co['countries'];
?>

    <label for="countries">Countries</label>
    <select name="countries" id="countries">
        @foreach($countries as $country){
            @isset($country['iso2'])
                <option value="{{$country['name']}}">{{$country['name']}}</option>
            @endisset
        @endforeach
    </select>
