<div class="sidenav" style="text-align: center;">
    <img src="./images/profile/{{Auth::user()->id}}.png" class="img-rounded">
    <p>
        <a href="/profile/{{ Auth::user()->username }}">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a><br/>
        <a href="/profile/{{ Auth::user()->username }}/edit">Edit Profile</a>
    </p>
    <div class="list-group">
        <a href="#" class="list-group-item active">News Feed</a>
        <a href="#" class="list-group-item">Messages</a>
        <a href="#" class="list-group-item">Events</a>
        <a href="#" class="list-group-item">Saved</a>
        <a href="#" class="list-group-item">Find Friends</a>
    </div>
</div>