*********************************************************
** This program is distributed under the LGPL License, **
** for more information see file _LGPL.txt or          **
** http://www.gnu.org/licenses/lgpl.html               **
**                                                     **
**  Copyright 2008-2011 by Laurent Minguet             **
*********************************************************
*******************************
* HTML2PDF v4.03 - 2011-05-27 *
*******************************

How to use :
------------
 - You need at least PHP 5

 - Look at the examples provided to see how it works.

 - It is very important to provide valid HTML 4.01 to the converter,
   but only what is in the <body>

 - for borders: it is advised that they are like "solid 1mm #000000"

 - for padding, they are applicable only on tags table, th, td, div, li

 - A default font can be specified, if the requested font does not exist or if no font is specified:
     $html2pdf->setDefaultFont('Arial');

 - The possibility to protect your PDF is present, CF Example 7.

 - Some tests can be enabled (true) or disabled (false) :
     * setTestIsImage method:      test that images must exist
     * setTestTdInOnePage method:  test that the contents of TDs fit on one page
     * setTestIsDeprecated method: test that old properties of specific tags are not used anymore

  - A DEBUG mode to know the resources used is present
   It is activated by adding the following command just after the contructor (see Example 0):
      $htmlpdf->setModeDebug();

 - Some specific tags have been introduced:
     * <page></page>  (CF Exemple 7 & wiki)
       determines the orientation, margins left, right, top and bottom, the background image
       and the background color of a page, its size and position, the footer.
       It is also possible to keep the header and footer of the previous pages,
       through the attribut pageset="old" (see Example 3 & 4 & wiki)

     * <page_header></page_header> (CF Example 3 & wiki)

     * <page_footer></page_footer> (CF Example 3 & wiki)

     * <nobreak></nobreak> (cd wiki)
         used to force the display of a section on the same page.
         If this section does not fit into the rest of the page, a page break is done before.

     * <barcode></barcode>  (CF Examples 0 & 9 & wiki)
         can insert barcodes in pdfs, CF Examples 0 and 9
         The possible types of codebar are alls of TCPDF

     * <qrcode></qrcode> (CF Example 13 & wiki)
         can insert QRcode 2D barcodes
         (QR Code is registered trademark of DENSO WAVE INCORPORATED | http://www.denso-wave.com/qrcode/)

     * <bookmark></bookmark>  (CF Examples 7 & About & wiki)
         can insert bookmark in pdfs, CF Example 7 and About.
         It is also possible to automatically create an index at the end of
         document  (CF Example About & wiki)

     * css property "rotate" :
         values : 0, 90, 180, 270
         works only on div (cf example 8)

change log :
-----------
 see on this page : http://html2pdf.fr/en/download

Help & Support :
---------------
 For questions and bug reports, thank you to use only the support link below.
 I will answer to your questions only on it...

Informations :
-------------
 Programmer : Spipu
      email    : webmaster@html2pdf.fr
      web site : http://html2pdf.fr/
      wiki     : http://html2pdf.fr/en/wiki
      support  : http://html2pdf.fr/en/forum

Thanks :
-------
 * Olivier Plathey: for have made FPDF
 * Nicola Asuni: for the changes he has agreed to make to TCPDF
 * yAronet: for hosting support forum
 * everyone who helped me to develop this library and to bring the texts









Modo de empleo:
------------
  - Necesita al menos PHP 5

  - Mira los ejemplos para ver c�mo funciona.

  - Es muy importante proporcionar HTML v�lido 4.01 al convertidor,
    pero s�lo lo que est� en el <body>

  - Para las fronteras: se aconseja que son como "1mm solid # 000000"

  - Para el relleno, que son aplicables s�lo en las etiquetas tabla, ju, td, div, li

  - Una fuente predeterminada se puede especificar, si la fuente solicitada no existe o, si no se especifica ning�n tipo de letra:
      $ html2pdf-> setDefaultFont ('Arial');

  - La posibilidad de proteger su PDF est� presente, CF Ejemplo 7.

  - Algunas de las pruebas se pueden activar (true) o desactivado (false):
      * M�todo setTestIsImage: prueba que debe existir im�genes
      * M�todo setTestTdInOnePage: prueba que el contenido de TDs caben en una p�gina
      * M�todo setTestIsDeprecated: prueba de que las propiedades viejas de las etiquetas espec�ficas ya no se utilizan

   - A modo de depuraci�n para conocer los recursos utilizados est� presente
    Se activa mediante la adici�n del siguiente comando justo despu�s de la contructor (v�ase el Ejemplo 0):
       $ htmlpdf-> setModeDebug ();

  - Algunas etiquetas espec�ficas se han introducido:
      * <P�gina> </ page> (CF Exemple 7 & wiki)
        determina la orientaci�n, los m�rgenes izquierdo, derecho, superior e inferior, la imagen de fondo
        y el color de fondo de una p�gina, su tama�o y posici�n, el pie de p�gina.
        Tambi�n es posible mantener el encabezado y pie de p�gina de las p�ginas anteriores,
        a trav�s de la PageSet attribut = "viejo" (v�ase el ejemplo 3 y 4 y wiki)

      * <Page_header> </ page_header> (CF Ejemplo 3 & wiki)

      * <Page_footer> </ page_footer> (CF Ejemplo 3 & wiki)

      * <Nobreak> </ nobreak> (wiki cd)
          utilizado para forzar la visualizaci�n de una secci�n en la misma p�gina.
          Si esta secci�n no encaja en el resto de la p�gina, un salto de p�gina se realiza antes.

      * <C�digo de barras> </ c�digo de barras> (Ejemplos CF 0 y 9 y wiki)
          puede insertar c�digos de barras en pdfs, ejemplos CF 0 y 9
          Los posibles tipos de codebar son alls de TCPDF

      * <Qrcode> </ qrcode> (CF Ejemplo 13 & wiki)
          puede insertar c�digos de barras 2D QRCode
          (QR Code es una marca registrada de DENSO WAVE INCORPORATED | http://www.denso-wave.com/qrcode/)

      * <Marcador> </ bookmark> (Ejemplos CF 7 & About & wiki)
          puede insertar marcador en pdfs, CF Ejemplo 7 y Acerca de.
          Tambi�n es posible crear autom�ticamente un �ndice al final de
          documento (CF Ejemplo About & wiki)

      * Propiedad CSS "gire":
          valores: 0, 90, 180, 270
          s�lo funciona en div (ver ejemplo 8)

cambio de registro:
-----------
  ver en esta p�gina: http://html2pdf.fr/en/download

Ayuda y Soporte:
---------------
  Para consultas e informes de errores, gracias a que permite utilizar s�lo el enlace de soporte.
  Voy a responder a sus preguntas s�lo en �l ...

informaciones:
-------------
  Programador: Spipu
       email: webmaster@html2pdf.fr
       sitio web: http://html2pdf.fr/
       wiki: http://html2pdf.fr/en/wiki
       apoyo: http://html2pdf.fr/en/forum

Gracias:
-------
  * Olivier Plathey: por haber hecho FPDF
  * Nicola Asuni: para los cambios que ha acordado hacer para TCPDF
  * YAronet: para acoger el foro de soporte
  * Todos los que me ayudaron a desarrollar esta biblioteca y llevar a los textos

