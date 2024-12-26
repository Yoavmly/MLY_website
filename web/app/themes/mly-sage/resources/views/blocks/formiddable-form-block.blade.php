<div class="{{ $block->classes }}" style="{{ $block->inlineStyle }}">
 <div class="form-block">
   <div class="inner-block">
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
 </div>
</div>
