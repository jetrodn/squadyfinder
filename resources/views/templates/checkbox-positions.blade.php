@foreach($specs as $spec)
    <div class="col-md-4 {{ $spec->class_name }}">
        <input type="checkbox" class="group " name="specs[]" id="{{ $spec->class_name }}"
               value="{{ $spec->id }}">
        <label for="{{ $spec->class_name }}">{{ $spec->spec_name }}</label>
    </div>
@endforeach


            <!--
<div class="col-md-4 frontend">
    <input type="checkbox" class="group" name="frontend" id="frontend" value="frontend">
    <label for="frontend">Frontend</label>
</div>

<div class="col-md-4 backend">
    <input type="checkbox" class="group"  name="backend" id="backend" value="backend">
    <label for="backend">Backend</label>
</div>

<div class="col-md-4 designer">
    <input type="checkbox" class="group"  name="designer" id="designer" value="designer">
    <label for="designer">Designer</label>
</div>

<div class="col-md-4 marketer">
    <input type="checkbox" class="group"  name="marketer" id="marketer" value="marketer">
    <label for="marketer">Marketer</label>
</div>


<div class="col-md-4 seo">
    <input type="checkbox" class="group"  name="seo" id="seo" value="seo">
    <label for="seo">SEO</label>
</div>

<div class="col-md-4 tester">
    <input type="checkbox" class="group"  name="tester" id="tester" value="tester">
    <label for="tester">Tester</label>
</div>

<div class="col-md-4 teamlead">
    <input type="checkbox" class="group"  name="teamlead" id="teamlead" value="teamlead">
    <label for="teamlead">Teamlead</label>
</div>

<div class="col-md-4 contentmanager">
    <input type="checkbox" class="group"  name="contentm" id="contentm" value="contentm">
    <label for="contentm">Content Manager</label>
</div>

<div class="col-md-4 database last-position">
    <input type="checkbox" class="group"  name="dpm" id="dpm" value="dpm">
    <label for="dpm">Database Manager</label>
</div>
-->