<style type="text/css">
.popup{
  padding: 25px;
  border-radius: 15px;
  top: 10%;
  max-width: 380px;
  width: 100%;
  opacity: 0;
  position:absolute;
  pointer-events: none;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
  transform: translate(-50%, -50%) scale(1.2);
  transition: top 0s 0.2s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;
}
.popup.show{
    z-index:100000;
    background: rgb(255, 254, 254);

  opacity: 1;
  pointer-events: auto;
  transform:translate(-50%, -50%) scale(1);
  transition: top 0s 0s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;

}
.popup :is(header, .icons, .field){
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.popup header{
  padding-bottom: 15px;
  border-bottom: 1px solid #ebedf9;
}
.popup header span{
  font-size: 21px;
  font-weight: 600;
}
.popup header .close, .icons a{
  display: flex;
  align-items: center;
  border-radius: 50%;
  justify-content: center;
  transition: all 0.3s ease-in-out;
}
.popup header .close{
  color: #878787;
  font-size: 17px;
  background: #f3f3f3;
  height: 33px;
  width: 33px;
  cursor: pointer;
}
.popup header .close:hover{
  background: #ebedf9;
}
.popup .content{
  margin: 20px 0;
}
.popup .icons{
  margin: 15px 0 20px 0;
}
.content p{
  font-size: 16px;
}
.content .icons a{
  height: 50px;
  width: 50px;
  font-size: 20px;
  text-decoration: none;
  border: 1px solid transparent;
}
.icons a i{
  transition: transform 0.3s ease-in-out;
}
.icons a:nth-child(1){
  color: #1877F2;
  border-color: #b7d4fb;
}
.icons a:nth-child(1):hover{
  background: #1877F2;
}
.icons a:nth-child(2){
  color: #46C1F6;
  border-color: #b6e7fc;
}
.icons a:nth-child(2):hover{
  background: #46C1F6;
}
.icons a:nth-child(3){
  color: #e1306c;
  border-color: #f5bccf;
}
.icons a:nth-child(3):hover{
  background: #e1306c;
}
.icons a:nth-child(4){
  color: #25D366;
  border-color: #bef4d2;
}
.icons a:nth-child(4):hover{
  background: #25D366;
}
.icons a:nth-child(5){
  color: #0088cc;
  border-color: #b3e6ff;
}
.icons a:nth-child(5):hover{
  background: #0088cc;
}
.icons a:hover{
  color: #fff;
  border-color: transparent;
}
.icons a:hover i{
  transform: scale(1.2);
}
.field{
  margin: 12px 0 -5px 0;
  height: 45px;
  border-radius: 4px;
  padding: 0 5px;
  border: 1px solid #757171;
}
.field.active{
  border-color: #F7941D ;
}
.field i{
  width: 50px;
  font-size: 18px;
  text-align: center;
}
.field.active i{
  color: #F7941D ;
}
.input{
  width: 100%;
  height: 100%;
  border: none;
  outline: none;
  font-size: 15px;
}
.copy{
  color: #fff;
  padding: 5px 18px;
  background: #F7941D ;
}
.copy:hover{
  background: #f1b855;

}
</style>
<!-- Button trigger modal -->
<a type="a" href="#" data-bs-toggle="modal" data-bs-target="#Share"><i class="fa fa-share-nodes text-dark" style="font-size: 20px"></i></a>

  <!-- Modal -->
  <div class="modal fade" id="Share" tabindex="-1" aria-labelledby="ShareLabel" aria-hidden="true">
    <div class="modal-dialog p-2">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ShareLabel">{{ __('المشاركة') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
            <div class="content pb-2 pt-2">
                <p>{{ __('المشاركة في مواقع التواصل الإجتماعي') }}</p>
                <div class="row text-center">
                    <ul class="icons text-center">
                        <a target="_Blank" style="float:right" class="m-2" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fab fa-facebook-f"></i></a>
                        <a target="_Blank" style="float:right" class="m-2" href="https://twitter.com/intent/tweet?text={{ url()->current() }}"><i class="fab fa-twitter"></i></a>
                        <a target="_Blank" style="float:right" class="m-2" href="https://www.instagram.com/?url={{ url()->current() }}"><i class="fab fa-instagram"></i></a>
                        <a target="_Blank" style="float:right" class="m-2" href="https://wa.me/?text={{ url()->current() }}"><i class="fab fa-whatsapp"></i></a>
                        <a target="_Blank" style="float:right" class="m-2" href="https://t.me/share/url?url={{ url()->current() }}"><i class="fab fa-telegram-plane"></i></a>
                      </ul>
                </div>
                <p>{{ __('أو نسخ الرابط') }}</p>
                <div class="field">
                    <i class="url-icon uil uil-link"></i>
                    <input type="text" class="input" readonly value="{{ url()->current() }}">
                    <br><p><center> <button class="copy">{{ __('نسخ') }}</button></center></p>
                    <br>
                </div>
                <p><br></p>
              </div>
        </div>

      </div>
    </div>
  </div>

@section('scripts')
@parent
<script type="text/javascript">
    const field = $(".field"),
    input = $(".input"),
    copy = $(".copy");
    $(".copy").click(function(e){
        input.select(); //select input value
        if(document.execCommand("copy")){ //if the selected text is copied
            field.addClass('active');
            copy.html("{{ __('تم') }}");
            setTimeout(()=>{
            window.getSelection().removeAllRanges(); //remove selection from page
            field.removeClass('active');
            copy.html("{{ __('نسخ') }}");
            }, 3000);
        }

    });

</script>
@endsection
