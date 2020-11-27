<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Rest_Operations
{
    const RANKING   = 'ranking';
    const QUOTE     = 'quote';
    const AUTHOR    = 'author';
    protected $_quotes = array(
        array(self::RANKING => 1, self::QUOTE => 'Les meilleures choses qui arrivent dans le monde de l’entreprise ne sont pas le résultat du travail d’un seul homme. C’est le travail de toute une équipe.', self::AUTHOR => 'Steve Jobs'),
        array(self::RANKING => 2, self::QUOTE => 'Il y a plus d’idées dans deux têtes que dans une.', self::AUTHOR => 'Jacques Chirac'),
        array(self::RANKING => 3, self::QUOTE => 'Se réunir est un début, rester ensemble est un progrès, travailler ensemble est la réussite.', self::AUTHOR => 'Henry Ford'),
        array(self::RANKING => 4, self::QUOTE => 'Tout le monde savait que c’était impossible à faire. Puis un jour quelqu’un est arrivé qui ne le savait pas, et il l’a fait.', self::AUTHOR => 'Mark Twain'),
        array(self::RANKING => 5, self::QUOTE => 'La plus grande gloire n’est pas de ne jamais tomber, mais de se relever à chaque chute.', self::AUTHOR => 'Confucius'),
        array(self::RANKING => 6, self::QUOTE => 'Certains veulent que ça arrive, d’autres aimeraient que ça arrive et quelques-uns font que ça arrive.', self::AUTHOR => 'Michael Jordan'),
        array(self::RANKING => 7, self::QUOTE => 'Lorsque deux forces sont jointes, leur efficacité est double.', self::AUTHOR => 'Isaac Newton'),
        array(self::RANKING => 8, self::QUOTE => 'Être un homme, c’est sentir, en posant une pierre, que l’on contribue à bâtir le monde.', self::AUTHOR => 'Antoine de Saint-Exupéry'),
        array(self::RANKING => 9, self::QUOTE => 'Si seulement HP savait ce que HP sait, nous serions trois fois plus productifs.', self::AUTHOR => 'Lew Platt (ancien PDG de HP)'),
        array(self::RANKING => 10, self::QUOTE => 'Les performances individuelles, ce n’est pas le plus important. On gagne et on perd en équipe.', self::AUTHOR => 'Zinedine Zidane')
    );


    public function getDate()
    {
        return date("Y-m-d");
    }
    
    public function bonjour()
    {
        return "Bonjour je suis une opération de test au sein du webservice REST";
    }
    
    public function quote()
    {
        return $this->_quotes[rand(0, 9)];
    }
    
    
}