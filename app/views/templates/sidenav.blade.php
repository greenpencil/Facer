<div class="sidenav" style="text-align: center;">
    <img src="./images/profile/{{Auth::user()->id}}.png" class="img-rounded">
    <p>
        {{Auth::user()->first_name}} {{Auth::user()->last_name}}<br/>
        Edit Profile
    </p>
    <ul>
        <li>News Feed</li>
        <li>Messages</li>
        <li>Events</li>
        <li>Saved</li>
        <li>Find Friends</li>
    </ul>
</div>