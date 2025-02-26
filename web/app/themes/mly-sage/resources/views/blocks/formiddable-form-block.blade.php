<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
 <div class="form-block" id="form-block-1">
   <div class="inner-block" style="--arrow-url : url('{{ asset("images/arrow-down-white.png") }}')">
     <img src="{{ \Roots\asset("images/specialBlock/1.png") }}"/>
     <img src="{{ \Roots\asset("images/specialBlock/2.png") }}"/>
     <div class="blurred-background"></div>
     <div class="content">
       <div class="text-section">
         <h1>
           {!! $title !!}
         </h1>
       </div>
       <div class="form-section">
  {{--       {!! do_shortcode('[formidable id="'. $form_id .'"]') !!}--}}
         {!! FrmFormsController::get_form_shortcode(['id' => $form_id]) !!}
       </div>
     </div>
   </div>
   <div class="copyright-footer">
     <span class="footer-text">&copy;2024 MLY All Rights Reserved</span>
   </div>
 </div>
</div>
