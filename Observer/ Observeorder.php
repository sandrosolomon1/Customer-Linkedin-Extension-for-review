<?php
namespace Alliance\Linkedin\Observer;

class Observeorder implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        $order->getShippingAddress()->setLinkedinProfile($quote->getShippingAddress()->getLinkedinProfile());
        return $this;
    }
}
