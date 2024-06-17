<?php require_once './header.php'?>
        <div class="content-create">
                <div class="form-title-container">
                    <h2>Ajouter les informations de votre billet</h2>
                    <form action="../../scripts/createpost-script.php" method="POST">
                        <div class="equipe-form">
                            <input type="text" class="equipe1" placeholder="Equipe 1" name="equipe1">
                            <input type="text" class="equipe2" placeholder="Equipe 2" name="equipe2">
                        </div>
                        <div class="cat-groupe">
                            <select name="categorie" id="categorie" placeholder="Categorie">
                                <option value="Catégorie">Catégorie</option>
                                    <?php foreach ($enum_values as $value): ?>
                                <option value="<?php echo htmlspecialchars($value); ?>"><?php echo htmlspecialchars($value); ?></option>
                                    <?php endforeach; ?>
                            </select>
                            <input type="text" class="groupe" name="groupe" placeholder="Groupe">              
                        </div>
                        <div class="infos-match">
                            <input type="datetime-local" class="date-time" name="date_heure" placeholder="selectionnez la date et l'heure">
                            <input type="text" class="prix" name="prix" placeholder="prix">
                            <input type="text" class="lieu" name="lieu" placeholder="Lieu du Match">
                        </div>
                        <textarea type="text" class="content" placeholder="Description" name="description"></textarea>
                        
                        <input type="submit" value="Publier" class="submit">
                    </form>
                </div> 
        </div>