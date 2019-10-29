<style>
.btnChat {
    position: fixed;
    bottom: 0;
    right: 0;
    height: 70px;
    width: 70px;
    background: #ffffff;
    margin-right: 20px;
    margin-bottom: 20px;
    border-radius: 100%;
    box-shadow: 0px 0px 10px #8bc34a, inset 0px 0px 6px #8bc34a;
    padding: 6px;
    border: 2px solid #8bc34a;
}
.btnChat button {
    height: 100%;
    width: 100%;
    display: block;
    border: 1px solid #8bc34a;
    border-radius: 100%;
    background: #fff;
    font-size: 29px;
    color: #8bc34a;
}
.chat_popup {
    position: fixed;
    bottom: 0;
    right: 0;
    height: 435px;
    width: 329px;
    background: #ffffff;
    margin-right: 20px;
    margin-bottom: 20px;
    box-shadow: -2px 1px 5px -4px #1c1c1c;
    z-index: 9999;
    border-radius: 4px;
    display:none;
}
.chat_header{
    border-bottom:1px solid #ddd;
    height:50px;
    background:#8bc34a;
    border-radius:4px 4px 0px 0px;
    padding:10px;
    color:#fff;
}
.chat_header img{
    width:30px;
    border-radius:100%;
}
.chat_header .media-body{
    vertical-align:middle;
}
.chat_header h4{
    font-size:13px;
    margin:0px;
}
.chat_header p{
    margin:0px;
}
.chat_body{
    height:335px;
    overflow:hidden;
}
.chat_footer{
    border-top:1px solid #ddd;
    height:50px;
    background:#f9f9f9;
    border-radius:0px 0px 4px 4px;
}
</style>
<div class="btnChat">
    <button type="button"><i class="fa fa-comments-o"></i></button>    
</div>
<div class="chat_popup">
    <div class="chat_header">
        <div class="row">
            <div class="col-xs-9">
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="https://www.w3schools.com/bootstrap/img_avatar1.png" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Middle aligned media</h4>
                   <p>Online</p>
                  </div>
                </div>
            </div>
            <div class="col-xs-3">
                <i class="fa fa-close pull-right btnClosePopup"></i>
            </div>
        </div>
    </div>
    <div class="chat_body">
        
    </div>
    <div class="chat_footer">
    </div>
</div>
