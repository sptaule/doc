@include('helpers.style')

<label for="helper-source"></label>
<textarea class="hidden" rows="10" cols="82" id="helper-source">@yield('helpers.main')</textarea>
<div id="helper-target"></div>

@include('helpers.script')