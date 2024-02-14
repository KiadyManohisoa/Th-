--liste variété thé actuel
select * from The_Variete where id in (select max(id) from The_Variete group by nom);

-- liste des paiements pour les cueilleurs
create or replace view v_payement as select c1.dateCueillette,c2.nom,c1.poids,c1.bonus,c1.mallus,c1.commission from The_Cueillette c1 join The_Cueilleur c2 on c1.idCueilleur = c2.id; 
