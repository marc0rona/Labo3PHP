<?php
//interface impliment le observer pattern il notifiras Stock quand il auras une carrence du produit et ajouteras du stock
interface NotificationObserver{
public function LowStockAlert($produit);
}
?>