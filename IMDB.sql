-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 04 avr. 2022 à 11:23
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `IMDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `Titre_film` varchar(45) NOT NULL,
  `Genre` varchar(45) NOT NULL,
  `Realisateur` varchar(100) NOT NULL,
  `Scenario` varchar(1000) NOT NULL,
  `Casting` varchar(400) NOT NULL,
  `Date_de_sortie` date NOT NULL,
  `Date_ajout` date NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`Titre_film`, `Genre`, `Realisateur`, `Scenario`, `Casting`, `Date_de_sortie`, `Date_ajout`, `ID`) VALUES
('Morbius', 'Super-héros', 'Daniel Espinosa', 'Le biochimiste Michael Morbius tente de guérir une rare maladie sanguine, mais se retrouve par inadvertance infecté par un type de vampirisme.', 'jared leto,michael keaton,roy thomas', '2022-03-30', '2022-03-08', 1),
('Venom Ça va être un carnage', 'Science-fiction', 'Andy Serkis', 'Le quotidien d Eddie Brock est loin d être de tout repos. Depuis que le symbiote Venom partage son corps, il doit refréner les pulsions meurtrières de son visiteur extraterrestre. Sur les conseils d un policier, le journaliste est appelé à recueillir les confidences de Cletus Kasady, un tueur en série qui rêve de s échapper de prison avant d être condamné à mort. Son souhait pourrait se réaliser lorsqu il entre en contact avec le sang de Venom, lui conférant des pouvoirs extraordinaires. Seul Eddie pourra l arrêter... mais pour y arriver, il doit faire la paix avec Venom.', 'Tom Hardy,Woody Harrelson,Michelle Williams', '2021-09-01', '2022-03-08', 2),
('Le Batman', 'Suspense', 'Matt Reeves', 'Gotham City croule sous la criminalité, la peur et les inégalités sociales. Malgré les efforts de Batman pour défendre la population en danger, les ténèbres se sont emparées de la ville. La situation s envenime lorsque le maire est retrouvé mort. Le justicier masqué et le commissaire Gordon mènent l enquête sur cet horrible assassinat, remontant rapidement jusqu au Sphinx. Cet homme mystérieux a décidé de s attaquer à l omniprésente corruption qui gangrène la société en éliminant ses membres les plus influents. Dans sa quête de vérité, Batman croisera la route de la Femme-chat, du Pingouin et du parrain de la mafia Carmine Falcone.\r\n', 'Robert Pattinson,Jeffrey Wright,Zoë Kravitz', '2022-03-02', '2022-03-02', 3),
('Opération Blacklight', 'Suspense despionnage ', 'Mark Williams', 'Travis Block, un agent secret du FBI spécialisé dans l extraction d agents doubles dans des missions périlleuses, se retrouve pris au coeur d un complot meurtrier lorsqu un de ses agents, Dusty Crane, commence à avoir des doutes sur les véritables intentions de ses supérieurs. Ce dernier tente de faire éclore la vérité à propos d une certaine mission Unity qui mettrait la vie de citoyens américains en danger. Dusty discutera de la conspiration avec une journaliste, mais il sera rapidement mis hors d état de nuire par les hautes administrations. Travis s efforcera alors de faire la lumière sur cette affaire, tout en protégeant sa famille, maintenant menacée.', 'Liam Neeson,Aidan Quinn,Taylor John Smith', '2022-02-11', '2022-03-08', 4),
('Dune', 'Drame de science-fiction', 'Denis Villeneuve', 'Le Duc Leto Atréides se fait confier par l Empereur le contrôle de l Épice sur la planète désertique Arrakis. Cette substance permet notamment de prolonger la vie humaine et rend possible la navigation interstellaire, base de l économie impériale. Leto Atréides se rend alors sur Arrakis avec sa femme, Dame Jessica, et son fils Paul. Le Duc sera bientôt piégé dans un guet-apens et sa famille devra prendre la fuite à travers les dunes, peuplées de vers géants. Leur seule chance de survie est de fraterniser avec les Fremen, un peuple autochtone, vivant dans le désert profond d Arrakis. Mais, les Fremen n aiment pas les étrangers...', 'Timothée Chalamet,Zendaya,Jason Momoa', '2022-01-11', '2022-03-08', 5),
('La Matrice : Résurrections', 'Science-fiction', 'Lana Wachowski', 'Thomas Anderson est un concepteur de jeux vidéo qui a connu un immense succès avec son jeu La matrice, qui raconte la vie d un employé d une société informatique qui découvre que sa réalité n est qu un univers virtuel contrôlé par des machines. Thomas est suivi par un psychologue pour des délires schizophréniques. Une petite pilule bleue l aide à voir plus clair. Un jour, il est retrouvé par un certain Morpheus qui lui révèle que le jeu qu il a créé n est pas une fiction, mais un souvenir. Même si tout ça semble impossible, il acceptera de suivre le lapin blanc vers ce qu on lui dit être son destin.', 'Keanu Reeves ,Carrie-Anne Moss,Yahya Abdul-Mateen II', '2022-01-14', '2022-03-08', 6),
('Rêver grand', 'Comédie sentimentale', 'Paul Thomas Anderson ', 'Années 1970. Gary Valentine habite le quartier d Encino de Los Angeles. Enfant acteur profitant d une certaine célébrité, l adolescent de 15 ans possède du charisme à revendre. Lors d un événement scolaire, il s amourache d Alana Kane, une photographe de 25 ans. Cette dernière refuse de lui céder son coeur à cause de leur différence d âge, mais accepte de devenir son amie. Gary l entraîne dans des situations incroyables où il aura l occasion de faire des affaires d or et des rencontres marquantes. De quoi impressionner Alana qui vient d un tout autre milieu et qui commençait à s ennuyer dans son existence.', 'Alana Haim,Cooper Hoffman,Sean Penn', '2022-02-11', '2022-03-08', 7),
('L arracheuse de temps', ' Conte', 'Francis Leclerc', 'En 1988, Bernadette tente de rassurer son petit-fils, Fred, qui s inquiète de son trépas prochain, en lui disant que la Mort n existe plus. La vieille dame malade lui racontera comment, en 1927, les habitants du village de Saint-Élie-de-Caxton sont parvenus, par des tours rocambolesques, à éliminer la grande faucheuse, après qu un éclair ait frappé le pommier de l église, laissant présager un malheur.', 'Jade Charbonneau,Michèle Deslauriers,Céline Bonnier', '2021-11-19', '2022-03-08', 8),
('La saga Gucci', 'Drame biographique ', 'Ridley Scott', 'À la fin des années 70, Patrizia Reggiani séduit Maurizio Gucci, un des héritiers de la célèbre marque de luxe Gucci. Son père voit d un mauvais oeil l entrée dans la famille de cette femme provenant d un autre milieu, n hésitant pas à couper les ponts avec son fils. Lorsque l oncle Aldo cherche à ressouder les liens, Patrizia utilise cette occasion afin de s élever socialement et d asseoir son influence. Elle n hésite d ailleurs pas à écarter du pouvoir quelques membres de sa belle-famille. Qui sait comment elle réagira si jamais son époux se détourne d elle...,', 'Lady Gaga,Adam Driver,Jared Leto', '2021-11-24', '2022-03-08', 9),
('Les 355', 'Aventures d espionnage ', 'Simon Kinberg', 'Lorsqu une arme technologique extrêmement dangereuse tombe entre de mauvaises mains, une agente de la CIA, sa rivale allemande, une spécialiste informatique de la MI6 et une psychologue colombienne sont forcées de faire équipe afin de protéger la race humaine des dégâts que pourrait provoquer cet équipement révolutionnaire sur la civilisation. Alors qu elles parcourent le globe, de Paris à Shanghai en passant par Marrakech, les quatre femmes développeront une loyauté indéfectible, plus forte que n importe quelle arme.', 'Jessica Chastain,Diane Kruger,Lupita Nyong', '2022-02-07', '2022-03-08', 10),
('Déni cosmique', 'Comédie', 'Adam McKay', 'venir l humanité qu une comète menace de détruire la Terre.', 'Leonardo DiCaprio, Jennifer Lawrence, Meryl Streep', '2021-11-24', '2022-03-13', 11),
('The Kashmir Files', 'Drame', 'Vivek Agnihotri', 'e film s ouvre sur le véritable récit de l assassinat de Satish Tickoo par des terroristes du JKLF, puis illustre comment ils se sont promenés dans Srinagar équipés, à la recherche de pandits comme des sangsues voraces, pour les tuer après les avoir trouvés, nettoyer les familles et les ruiner. Les terroristes du JKLF n ont épargné personne, y compris les femmes et les enfants. Sans entrer dans la légalité de tout cela, ce moment établit la norme et constitue le début le plus définitif des dossiers qui enlèvent la gaze et ce que vous voyez par la suite, car la plupart soutiendraient l abdication de l article 370, du moins en théorie.', 'Mithun Chakraborty,Anupam Kher,Darshan Kumar', '2022-03-11', '2022-03-13', 12),
('L homme libre', 'Action,Aventure', 'Shawn Levy', 'Dans le jeu vidéo Free City, Guy est un personnage non-joueur employé dans une banque. Sa vie est réglée et il fait chaque jour la même chose, encore et encore. Jusqu au jour où il rencontre la belle Molotov Girl. Celle-ci est l avatar de Millie, une programmeuse qui cherche à prouver que le créateur de Free City, Antwan, a volé le code qu elle avait développé avec son ami Keys.', 'Ryan Reynolds,Jodie Comer', '2021-08-14', '2022-03-13', 13),
('Mourir peut attendre', 'Action', ' 	Cary Joji Fukunaga', 'Le film met en scène un ex-agent du MI6 vieillissant, volontairement coupé du monde dans une retraite en Jamaïque, mais qui reprend du service à la demande d un ami de la CIA lorsqu un mystérieux criminel commence à répandre une dangereuse arme biologique sur le monde. En sortant de son isolement, James Bond découvre qu il est le père d une fillette de quatre ans et que celle-ci et sa mère sont menacées par ce même criminel. ', 'Daniel Craig,Léa Seydoux,RamiMalek', '2021-11-28', '2022-03-13', 14),
('Notice rouge', 'Comédie d action', 'Rawson Marshall Thurber', 'Il y a deux mille ans, Marc-Antoine offrit à Cléopâtre trois œufs ornés de bijoux en guise de cadeau de mariage ; les œufs sont perdus au cours du temps jusqu à ce que deux soient retrouvés en 1907.\r\n\r\nEn 2021, l agent spécial John Hartley, un profileur du FBI, est chargé d aider l agent d Interpol Urvashi Das à enquêter sur le vol potentiel d un des œufs, exposé au musée du Château Saint-Ange à Rome, après avoir été informé qu il pourrait même avoir déjà été volé. Alors que le chef de la sécurité dissipe leur inquiétude, l œuf étant toujours exposé, Hartley dévoile que c est une copie. Le voleur, Nolan Booth, rentre ensuite chez lui à Bali avec l œuf mais Hartley, Das et une équipe d Interpol l arrêtent et récupèrent l œuf. À l insu de tous, Sarah Black, la principale concurrente de Booth connue sous le nom de \"Le Fou\", l échange contre un faux.', 'Dwayne Johnson,Ryan Reynolds,Gal Gadot\r\n', '2021-11-12', '2022-03-13', 15),
('Shang-Chi et la légende des dix anneaux', 'Super-héros', 'Destin Daniel Cretton', 'Shang-Chi, le maître kung-fu, doit affronter son père, leader du groupe terroriste des Dix Anneaux, et percer le mystère de leur légende. ', 'Simu Liu,Awkwafina,Tony Leung Chiu-wai', '2021-11-01', '2022-03-13', 16),
('SOS fantômes: L au-delà', 'Aventure', 'Jason Reitman', 'Endettée, Callie est expulsée de son logement et se retrouve obligée de s installer dans la vieille maison de son père dans la petite ville de Summerville, avec ses enfants Phoebe et Trevor. En fouillant dans la vieille bâtisse, les enfants découvrent du matériel de chasseurs de fantômes appartenant à leur défunt grand-père, Egon Spengler1. ', 'Mckenna Grace,Finn Wolfhard,Carrie Coon,Paul Rudd\r\n', '2021-12-01', '2022-03-13', 17),
('Ruelle de cauchemar', 'Suspense', ' Guillermo del Toro', 'Un forain ambitieux, qui a le talent de manipuler les gens avec peu de mots, rencontre une psychiatre qui s avère bien plus dangereuse qu il ne l est.', '	\r\n\r\nBradley Cooper,\r\nCate Blanchett,\r\nToni Collette', '2022-01-19', '2022-03-13', 18),
('Coda', 'Musique', 'Sian Heder', 'Une fille entendante dans une famille sourde doit choisir entre la poursuite de son amour de la musique sa famille, qui a besoin d velle pour avoir une connexion avec le monde extérieur. ', 'Emilia Jones\r\nEugenio Derbez\r\nTroy Kotsur', '2021-01-28', '2022-03-13', 19),
('Scream', 'Horreur', 'Matt Bettinelli-Olpin,Tyler Gillett', 'Vingt-cinq ans après les meurtres violents qui ont frappé Woodsboro, un tueur portant le masque de Ghostface fait de nouveau surface. Une bande d adolescents est prise pour cible, ce qui va forcer chacun à faire face à de lourds secrets... ', ' 	\r\n\r\nMelissa Barrera,\r\nJenna Ortega,\r\nDavid Arquette', '2022-01-22', '2022-03-13', 20),
('dzdz', 's', 'z', 'zs', 'sqqsq', '2022-03-08', '2022-03-02', 21),
('dzdz', 's', 'z', 'zs', 'sqqsq', '2022-03-08', '2022-03-02', 22),
('aaa', 'aaa', 'aaaa', 'aaa', 'aaa', '2022-03-16', '2022-03-09', 23),
('rrrrefzezaeazerazerzerzerzerzaer', 'eeee', 'aaaa', 'xxxxxx', 'gggggzrzaerzerzerzaerzaerzarze', '2022-04-16', '2022-04-02', 24);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
