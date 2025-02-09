<?php
include("database.php");
createEngineerTable();
createUsersTable();
registerDefaultUser();

$list = array(
    0 => array('nom' => 'MOULENGUE MOMBO', 'prenom' => 'Olivier', 'etablissement' => 'EPITA', 'diplome' => 'Ingénieur', 'promotion' => '2006'),
    1 => array('nom' => 'BOULINGUI MOUENFJI', 'prenom' => 'Constant', 'etablissement' => 'ESIGETEL (Efrei)', 'diplome' => 'ingénieur', 'promotion' => '2000'),
    2 => array('nom' => 'MBADINGA', 'prenom' => 'Gelase', 'etablissement' => '', 'diplome' => '', 'promotion' => ''),
    3 => array('nom' => 'MBACKY', 'prenom' => 'Clause', 'etablissement' => 'ESIGELEC', 'diplome' => 'ingénieur', 'promotion' => '2007'),
    4 => array('nom' => 'OLENDE OLENDE', 'prenom' => 'Damien', 'etablissement' => 'ESIGELEC', 'diplome' => 'ingénieur', 'promotion' => '2008'),
    5 => array('nom' => 'MOUSSAVOU', 'prenom' => 'Pontien Romanic', 'etablissement' => 'ESAIP', 'diplome' => 'ingénieur', 'promotion' => ''),
    6 => array('nom' => 'EKOMI', 'prenom' => 'Rebecca', 'etablissement' => 'IMT-BS', 'diplome' => 'ingénieur', 'promotion' => '2010'),
    7 => array('nom' => 'Mme Sandra TAHIRO APERANO née MEDZA M\'ADZABA', 'prenom' => '', 'etablissement' => 'EPITA', 'diplome' => 'ingénieur', 'promotion' => '2010'),
    8 => array('nom' => 'REZENDJANI REMBOGO', 'prenom' => 'Steeve Hermann', 'etablissement' => 'ESME Sudria', 'diplome' => 'ingénieur', 'promotion' => '2010'),
    9 => array('nom' => 'MBA ABOGHE', 'prenom' => 'Valéry', 'etablissement' => 'ECAM-Rennes', 'diplome' => 'ingénieur', 'promotion' => '2005'),
    10 => array('nom' => 'MEZUI MAMADOU', 'prenom' => 'Yanick', 'etablissement' => 'ISEP', 'diplome' => 'ingénieur', 'promotion' => '2005'),
    11 => array('nom' => 'BIKANG ABOGHE', 'prenom' => 'Félicien', 'etablissement' => 'EFREI', 'diplome' => 'ingénieur', 'promotion' => '2001'),
    12 => array('nom' => 'ELLA', 'prenom' => 'Franck', 'etablissement' => 'ECE', 'diplome' => 'ingénieur', 'promotion' => '1999'),
    13 => array('nom' => 'MBONGUI NGADI MBONGO', 'prenom' => 'Jonas', 'etablissement' => 'ECE', 'diplome' => 'ingénieur', 'promotion' => '2000'),
    14 => array('nom' => 'OBAME BIYOGHO', 'prenom' => 'Arthur', 'etablissement' => 'ESIGETEL (Efrei)', 'diplome' => 'ingénieur', 'promotion' => '2000'),
    15 => array('nom' => 'MAVIOGA', 'prenom' => 'Patrick', 'etablissement' => 'univ. Polytechnique Hauts-de-France', 'diplome' => 'master2', 'promotion' => '2000'),
    16 => array('nom' => 'ZENG ADZABE', 'prenom' => 'Joris', 'etablissement' => 'univ. D\'Artois', 'diplome' => 'master 2', 'promotion' => '2019'),
    17 => array('nom' => 'OBIANG MINTO\'O', 'prenom' => 'Charles Mauril', 'etablissement' => 'univ. Polytechnique de Masuku', 'diplome' => 'ingénieur', 'promotion' => '2005'),
    18 => array('nom' => 'MAYANDJI', 'prenom' => 'tex Derryck', 'etablissement' => 'Ecole. Polytechnique d\'Orléans', 'diplome' => 'ingénieur', 'promotion' => '2013'),
    19 => array('nom' => 'NGOMO', 'prenom' => 'Valéry', 'etablissement' => 'Ecole Centrale Nantes', 'diplome' => 'ingénieur', 'promotion' => '2005'),
);

// include("../List/list.php");

if(!empty($list)){
    foreach($list as $item){
        insertEngineerData($item);
    }
}
?>