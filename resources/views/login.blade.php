<h1> Login Form</h1>
<form action="user" method="post">
    @csrf
    <input type="text" name="email" ><br/>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>