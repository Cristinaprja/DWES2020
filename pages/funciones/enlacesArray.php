<?php
/**
 * Escribir un script que muestre una lista de enlaces. Los enlaces serán creados por una función que 
 * recibirá como como parámetro un array con las opciones necesarias.
 * PROYECTO portfolio.
 * Define un array asociativo para almacenar los trabajos, que incluya título y descripción.
 * Mostrar los trabajos procesando el array.
 * Escribir una función para mostrar un trabajo.
 * Escribir funciones para el manejo del tiempo de publicación de los trabajos.
 * 
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */
$arrayTrabajos = array(
    array("titulo" => "Proyecto de Java con MYSQL", "descripcion" => "Cupcake ipsum dolor sit amet. I love caramels lemon drops chupa chups I love chocolate cake croissant. Oat cake topping cookie fruitcake bear claw. Dessert biscuit I love candy halvah pudding tiramisu caramels. Tart liquorice macaroon bonbon cotton candy. Sesame snaps sweet jujubes sweet roll. Chocolate gummies cake."),
    array("titulo" => "Aplicación de Android", "descripcion" => "Cupcake ipsum dolor sit amet powder cheesecake jelly-o fruitcake. Chocolate bar tootsie roll lemon drops gummies ice cream carrot cake bear claw sugar plum. Jujubes oat cake danish I love soufflé chocolate bar caramels. Chocolate cake jelly I love macaroon halvah. Candy canes cotton candy toffee muffin jelly beans."),
    array("titulo" => "Wordpress para tienda online", "descripcion" => "Cupcake ipsum dolor sit amet pudding cake. Halvah liquorice oat cake dragée cotton candy macaroon. Chocolate cake donut donut sesame snaps gingerbread I love cheesecake bonbon. Carrot cake sweet bear claw carrot cake. Liquorice caramels brownie donut cookie. Apple pie cake brownie chupa chups halvah."),
    array("titulo" =>"Sitio web con JavaScript", "descripcion" => "Cupcake ipsum dolor. Sit amet sweet roll jelly beans cheesecake halvah I love biscuit candy. Sugar plum donut macaroon tootsie roll jelly-o soufflé cupcake. Candy tiramisu cheesecake carrot cake donut candy canes. I love carrot cake jelly-o cotton candy lollipop tootsie roll.")
);
function mostrarParrafos($array){
    echo "<section>";
    echo "<ul>";
    foreach($array as $key => $value){
        echo "<li><p><a href=\"#\">".$value['titulo']."</a><br>".$value['descripcion']."</p></li>";
    }
    echo "</ul>";
    echo "</section>";
}
mostrarParrafos($arrayTrabajos);