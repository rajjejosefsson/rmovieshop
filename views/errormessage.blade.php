

@if(isset($_SESSION['msg']))

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($_SESSION['msg'] as $error)
        <li>{!! $error !!}</li>
        @endforeach
    </ul>

</div>

<?php
unset($_SESSION['msg']);

?>



@endif