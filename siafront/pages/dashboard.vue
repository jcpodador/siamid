<template>
    <div>
        <NavBar />
        <div class="container">
    <h1 style="color:blue;">DASHBOARD</h1>
            <table class="table  table-Warning table-bordered">
                <tr><th class="text">User Information</th></tr>
                <tr><th>ID:</th><td>{{$auth.user.id}}</td></tr>
                <tr><th>User:</th><td>{{$auth.user.name}}</td></tr>
                <tr><th>Email:</th><td>{{$auth.user.email}}</td></tr>
            </table>
        </div>
    </div>
</template>

<style>
h1 {
    text-align: center;
    padding-bottom: 50px;
}
.container {
    padding: 50px;
}
.text {
    text-align: center;
}
</style>