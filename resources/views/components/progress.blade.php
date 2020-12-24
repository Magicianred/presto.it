@switch($imageValue)

@case('0')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break

@case('15')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break

@case('30')


<div class="progress shadow">
    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break

@case('50')


<div class="progress shadow">
    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break

@case('75')


<div class="progress shadow">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break

@case('100')


<div class="progress shadow">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

@break
@endswitch
