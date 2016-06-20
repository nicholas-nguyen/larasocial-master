@foreach($result as $u)
    <li class="active treeview">
        <a href="#">
            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg"
                 alt="User Image">
            <span class="username">
                {{ $u->firstname }} {{ $u->lastname }}
            </span>
        </a>
    </li>
@endforeach

