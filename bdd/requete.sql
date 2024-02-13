--liste variété thé actuel
select * from The_Variete where id in (select max(id) from The_Variete group by nom);

--liste des parcelles avec nom de variété
create or replace view v_the_parcelle as select p.id,p.surface,v.nom as variete,p.dateDebutPlantation from the_parcelle p join the_variete v on p.idVariete=v.id;