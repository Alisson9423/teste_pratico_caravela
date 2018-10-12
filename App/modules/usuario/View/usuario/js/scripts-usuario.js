var usuario = {
    render_upload_adm: function(_el){
        var id = $(_el).data("id");  
        
        var extraObj = $("#fileuploader").uploadFile({
          url:url_upload('usuario_adm'),
          fileName: "myfile",
          uploadStr:"Atualizar",
          maxFileSize:1024*1024,
          dragDrop: false,
          duplicateErrorStr: 'Este arquivo já existe.',
          showDelete: true,
          showPreview:true,
          maxFileCount:1,
          multiple:false,
          autoSubmit:false,
          maxFileCountErrorStr:"Apenas o primeiro arquivo sera inviado o limite é apenas ",
          
          formData: {
              id :id
          },
          onSuccess:function(files, data, xhr, pd) {
                  $.gritter.add({
                  title: get_nome(),
                  text: data,
                  image: get_img(),
                  close_icon: 'l-arrows-remove s16'
                  });
                  usuario.atualizar_adm(id);
              }
          
        }); 
         
          $("#extrabutton").click(function(){
              extraObj.startUpload();
              extraObj.reset();
              $.gritter.add({
              title: get_nome(),
              text: 'Por Favor Espere Um momento Sua Foto Esta Sendo Enviada',
              image: get_img(),
              close_icon: 'l-arrows-remove s16'
              });
              $("#upload").modal('hide');
          });
          
          $("#remove").click(function(){
              extraObj.reset();
          });
          
          
    },
    atualizar_adm : function (id){
        var id = id;
        console.log(url_post('atualizar_img'));
        
        $.post(url_post('atualizar_img'),
            {cookie: encodeURIComponent(document.cookie),
               id:id  
            }, function (data) {
                $("#img").empty();
                $("#img").html('<img data-toggle="modal" class="img-responsive " onclick="usuario.render_upload(this)" data-target="#upload" data-id="'+id+'" style="cursor:pointer" src="'+url_construct()[0]+'//'+url_construct()[2]+'/Upload/Usuario/'+id+'/'+data+'" alt="Avatar"><p class="mt10">Online<span class="device"><i class="fa fa-mobile s16"></i></span></p>');
                
                $("#user").removeAttr('src');
                $("#user").attr('src',url_construct()[0]+'//'+url_construct()[2]+'/Upload/Usuario/'+id+'/'+data);
                
                $("#img_modal").removeAttr('src');
                $("#img_modal").attr('src',url_construct()[0]+'//'+url_construct()[2]+'/Upload/Usuario/'+id+'/'+data);
                
                
                
        });
    },
};

let form = document.querySelector('form');

if(form){
    form.addEventListener('submit',helperForm.add,false);       
}