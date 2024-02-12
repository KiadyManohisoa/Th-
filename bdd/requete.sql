--liste variété thé actuel
select * from The_Variete where id in (select max(id) from The_Variete group by nom);


