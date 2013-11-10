<style>
ul {
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
}
ul .menuButton {
    display: block;
    position: relative;
    float: left;
}
li .menuList {
    display: none;
}
#menu a, menuItem {
    display: block;
    text-decoration: none;
    color: #ffffff;
    border-top: 1px solid #ffffff;
    padding: 5px 15px 5px 15px;
    background: #009999;
    margin-left: 1px;
    white-space: nowrap;
}
#menu a:hover, menuItem:hover {
background: #3b3b3b;
}
li:hover ul {
    display: block;
    position: absolute;
    z-index: 1000;
}
li:hover li {
    float : none ;
    font-size: 15px;
}
li:hover a 
{ background: #3b3b3b; }
li:hover li a:hover {
    background: #686868 ;	
}
#menu {
	z-index=1000;
}
</style>

<ul id="menu">
    <li class="menuButton"><a href="home.php">Home</a></li>
    <li class="menuButton"><menuItem>Μενού</menuItem>
        <ul class="menuList">
            <li class="menuLink"><a href="list_proionta.php">Προιόντα</a></li>
            <li class="menuLink"><a href="add_proionta.php">Νέο προιόν</a></li>
            <li class="menuLink"><a href="list_category.php">Κατηγορίες</a></li>
            <li class="menuLink"><a href="add_category.php">Νέα κατηγορία</a></li>
            <li class="menuLink"><a href="list_idiotites.php">Ιδιότητες</a></li>
            <li class="menuLink"><a href="add_idiotites.php">Νέα ιδιότητα</a></li>
            <li class="menuLink"><a href="list_ulika.php">Υλικά</a></li>
            <li class="menuLink"><a href="add_ulika.php">Νέο υλικό</a></li>
            
        </ul>
    </li>
    <li class="menuButton"><menuItem>Παραγγελίες</menuItem>
        <ul class="menuList">
            <li class="menuLink"><a href="list_orders.php">Παραγγελίες</a></li>
            <li class="menuLink"><a href="add_order.php">Πρόσθεσε παραγγελία</a></li>
     </ul>
    </li>
    
    <li class="menuButton"><menuItem>Χρήστες</menuItem>
        <ul class="menuList">
            <li class="menuLink"><a href="add_user.php">Πρόσθεσε υπάλληλο</a></li>
            <li class="menuLink"><a href="list_users.php">Υπάλληλοι</a></li>
            </ul>
    </li>
    <li class="menuButton"><menuItem>Τζίρος</menuItem>
        <ul class="menuList">
            <li class="menuLink"><a href="statistics_day.php">Στατιστικά ανά μέρα</a></li>
            <li class="menuLink"><a href="statistics_week.php">Στατιστικά ανά εβδομάδα</a></li>
            <li class="menuLink"><a href="statistics_month.php">Στατιστικά ανά μήνα</a></li>
        </ul>
    </li>
</ul>
