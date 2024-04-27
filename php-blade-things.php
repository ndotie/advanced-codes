//Did you know that you can state date on php file, i meant the current date like below
<div class="col-sm-12 mb-4 text-muted text-right">
        <small>
            <span class="d-none d-sm-inline">Today is </span>
            <span data-format="D d M Y" data-time="{{ now()->timestamp }}"></span>
        </small>
    </div>
//SOOO SWEET RIGHT!!
