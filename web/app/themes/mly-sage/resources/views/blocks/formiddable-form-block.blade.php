<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
 <div class="form-block">
{{--   <img class="flame-last-image" src="{{ url(asset('images/flame-last.png')) }}" alt="flame 2">--}}
   <div class="inner-block">
     <div class="blurred-background"></div>
     <div class="content">
       <div class="text-section">
         <h1>
           Let's&nbsp;<span>Make</span> it&nbsp;Happen
         </h1>
       </div>
       <div class="form-section">
  {{--       {!! do_shortcode('[formidable id="'. $form_id .'"]') !!}--}}
         {!! FrmFormsController::get_form_shortcode(['id' => $form_id]) !!}
       </div>
     </div>
   </div>
   <div class="footer">
     &copy;2024 MLY All Rights Reserved
   </div>
 </div>
</div>
