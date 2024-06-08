function changetaille(taille) {
    document.getElementById('texteu').style.fontSize = taille + 'px';
    document.getElementById('textei').style.fontSize = taille + 'px';
    document.getElementById('texte2').style.fontSize = taille + 'px';
    document.getElementById('texteo').style.fontSize = taille + 'px';
  }
  
  function changecouleur(couleur) {
    document.getElementById('texte').style.color = couleur;
    document.getElementById('texte1').style.color = couleur;
    document.getElementById('texte2').style.color = couleur;
    document.getElementById('texte3').style.color = couleur;
    document.getElementById('texte4').style.color = couleur;
    document.getElementById('texte5').style.color = couleur;
    document.getElementById('texte6').style.color = couleur;
    document.getElementById('texte7').style.color = couleur;
    document.getElementById('text2').style.color = couleur;
    document.getElementById('text3').style.color = couleur;
  }
  function changecouleurfont(couleurs) {
    document.getElementById('textes').style.backgroundColor = couleurs;
    document.getElementById('text1').style.backgroundColor = couleurs;
    document.getElementById('text2').style.backgroundColor = couleurs;
    
    // document.querySelectorAll('#textes','#text1').style.backgroungColor = couleurs;
  }
  function changefontstyle(font) {
    document.getElementById('textet').style.fontFamily = font;
  }