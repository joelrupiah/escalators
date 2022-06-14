<template>
<div id="inbox_email">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="header">
                <button class="btn btn-success btn-xs btn-block">Messages</button>
            </div>
            <hr>
            <div class="detail-user">
                <a href="">
                    <ul>
                        <li class="text-muted text-center">
                            <i icon="el-icon-user-solid" ></i> Joel Rupiah
                        </li>
                    </ul>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="unit-header">
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-success btn-xs btn-block">Actions</button>
                    </div>
                    <div class="d-flex justify-content-center ml-2">
                        <el-button size="mini" icon="el-icon-refresh"></el-button>
                    </div>
                    <div class="d-flex justify-content-end ml-2">
                        <button class="btn btn-success btn-xs">Compose</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<style scoped>
/* .container{
    background-color: gray;
    margin-left: 20px;
    margin-right: 20px;
    margin-bottom: 20px;
} */
.header, .unit-header{
    padding: 10px;
}
ul{
    text-decoration: none;
    list-style: none;
}
.col-md-3{
    background-color: white;
}
.col-md-9{
    background-color: white;
}
</style>

<script>
export default {
    name: 'InboxEmail'
}
</script>