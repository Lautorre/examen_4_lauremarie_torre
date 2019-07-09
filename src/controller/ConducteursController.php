<?php


class ConducteursController {


    public function liste() {

        $conducteurs = Conducteur::findAll();

        view('conducteurs.liste', compact('conducteurs'));
    }

    public function add() {

        view('conducteurs.add');
    }

    public function save() {

        $conducteur = new Conducteur;
        $conducteur->setId($_POST['id']);
        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);

        $conducteur->save();

        redirectTo('liste-conducteurs');

    }

    public function edit($id) {
        $conducteur= Conducteur::findOne($id);

        view ('conducteurs.edit', compact('conducteurs'));
    }

    public function update($id){

        $conducteur= Conducteur::findOne($id);
        $conducteur= setNom($_POST['nom']);
        $conducteur= setMail($_POST['mail']);
        $conducteur->update();

        Header ('Location: '.url('liste-conducteur/' . $conducteur->GetId()));
    }

    public function delete($id) {
        $conducteur= Conducteur::findOne($id);
        $conducteur= setId($_POST['Id']);
        $conducteur= setPrenom($_POST['prenom']);
        $conducteur= setNom($_POST['nom']);

        $conducteur->delete();

        Header ('Location: '.url('liste-conducteur'));

    }

    public function show($id) {
        $conducteur= Conducteur::findOne($id);

        $conducteur= setId($_POST['id']);
        $conducteur= setPrenom($_POST['prenom']);
        $conducteur= setNom($_POST['nom']);

        $conducteur->show();

        Header ('Location: '.url('liste-conducteur/' . $conducteur->GetId()));
        view ('conducteurs.show');

    }

}