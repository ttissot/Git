startList = function() {
if (document.all&&document.getElementById) {
navRoot = document.getElementById("nav_main");
for (i=0; i<navRoot.childNodes.length; i++) {
node = navRoot.childNodes[i];
if (node.nodeName=="LI") {
node.onmouseover=function() {
this.className+=" over";
  }
  node.onmouseout=function() {
  this.className=this.className.replace(" over", "");
   }
   }
  }
 }
}
window.onload = function() {
	startList();
}

// bascule de visibilité p.353 et s. dans book Jeffrey Zeldman "Design web : utiliser les standards"
function toggle( targetId ) {
	if (document.getElementById){
		target = document.getElementById( targetId );
			if (target.style.display == "none"){
				target.style.display = "";
			} else {
				target.style.display = "none";
			}
	}
}