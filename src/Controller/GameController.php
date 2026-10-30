<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;
use Datetime;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): mixed 
    {
      $data = [];

    $consoleRepository = new ConsoleRepository();
    $data['consoles'] = $consoleRepository->findAllConsoles();

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (!empty($_POST['title'])
            && !empty($_POST['type'])
            && !empty($_POST['publish_at'])
            && !empty($_POST['id_console'])
            )
        {
            $title = Tools::sanitize($_POST['title']);
            $type = Tools::sanitize($_POST['type']);
            $publishAt = Tools::sanitize($_POST['publish_at']);
            $idConsole = (int) Tools::sanitize($_POST['id_console']);

            $console = new Console();
            $console->setId($idConsole);

            $game = new Game();
            $game->setTitle($title);
            $game->setType($type);
            $game->setPublishAt(new DateTime($publishAt));
            $game->setConsole($console);

            $this->gameRepository->saveGame($game);

            $data['valid'] = 'Le jeu a bien été ajouté.';
        }
        else
        {
            $data['error'] = 'Tous les champs sont obligatoires.';
        }
    }

    $this->render('add_game', 'Ajouter un jeu', $data);

    return null;
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        
        $data = [];

        $games = $this->gameRepository->findAllGames();

        $data['games'] = $games;

    $this->render('show_all_games', 'Liste des jeux', $data);

    return null;
    }
}
