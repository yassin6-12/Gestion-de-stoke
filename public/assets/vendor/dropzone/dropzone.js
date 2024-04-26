Dropzone.options.demoUpload = {
    url: "{{ route('categorie.store') }}", // Route Laravel pour gérer le téléchargement
    paramName: 'photo', // Nom du champ de fichier dans votre formulaire
    maxFilesize: 2, // Taille maximale du fichier en mégaoctets
    acceptedFiles: 'image/*', // Types de fichiers acceptés (ici, uniquement les images)
    addRemoveLinks: true, // Ajouter des liens pour supprimer les fichiers téléchargés
    success: function(file, response) {
        // Callback en cas de succès (vous pouvez effectuer des actions supplémentaires ici si nécessaire)
    },
    error: function(file, response) {
        // Callback en cas d'erreur (vous pouvez afficher un message d'erreur ici si nécessaire)
    }
};
