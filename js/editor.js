KISSY.add(function(S,Editor,Base,Overlay){
	var $ = S.all;
	function EditorPlugin(renderTo,cfg){
		var self = this;
		if(renderTo && $(renderTo)[0]){
			self.init(renderTo,cfg);
		}
	}

	S.extend(S,EditorPlugin,{
		init:function(renderTo,cfg){
			var self = this;
			self.$renderTo = $(renderTo);
			self.cfg = S.mix({},cfg);
			self.render();
			self.bindEvt();
		},
		render:function(){
			var self = this;
			if(self.dialog){

			}else{
				self.dialog = new Overlay.Dialog({
					
				});
			}
		},
		__initEditor:function(){
			if(self.editor){

			}else{
				self.editor = new Editor({

				});
			}
		},
		bindEvt:function(){
			var self = this;

		}
	});

	return EditorPlugin;

},{requires:["editor","base","overlay"]})