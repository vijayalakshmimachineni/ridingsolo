<?php
namespace App\Domain\Ridingsolo;

use App\Domain\Ridingsolo\RidingsoloRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/**
 * Service.
 */
final class Ridingsolo
{
  /**
   * @var RidingsoloRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param RidingsoloRepository $repository The repository
   */
  public function __construct(RidingsoloRepository $repository)
  {
    $this->repository = $repository;
  }
  public function getOffers() {
    $offers = $this->repository->getOffers();
    return $offers;
  }
  public function getDifficulties() {
    $difficulties = $this->repository->getDifficulties();
    return $difficulties;
  }
  public function getBikeDifficulties() {
    $difficulties = $this->repository->getBikeDifficulties();
    return $difficulties;
  }
  public function getBikeTerrains() {
    $difficulties = $this->repository->getBikeTerrains();
    return $difficulties;
  }
  public function getLpTerrains() {
    $difficulties = $this->repository->getLpTerrains();
    return $difficulties;
  }
  public function getHostelTerrains() {
    $difficulties = $this->repository->getHostelTerrains();
    return $difficulties;
  }
  public function getHowDidYouFindUs() {
    $difficulties = $this->repository->getHowDidYouFindUs();
    return $difficulties;
  }
  public function getHaveYouTrekkedWithUs() {
    $difficulties = $this->repository->getHaveYouTrekkedWithUs();
    return $difficulties;
  }
  public function getRegions() {
    $difficulties = $this->repository->getRegions();
    return $difficulties;
  }
  public function getStates() {
    $states = $this->repository->getStates();
    return $states;
  }
  public function getCountries() {
    $states = $this->repository->getCountries();
    return $states;
  }
  public function getCountryStates($data) {
    $states = $this->repository->getCountryStates($data);
    return $states;
  }
  public function getStateCities($data) {
    $states = $this->repository->getStateCities($data);
    return $states;
  }
  public function getMonths() {
    $months = $this->repository->getMonths();
    return $months;
  }
  public function getSlabs() {
    $slabs = $this->repository->getSlabs();
    return $slabs;
  }
  public function getUpcomingTreks($data) {
    $treks = $this->repository->getUpcomingTreks($data);
    return $treks;
  }
  public function getUpcomingTrips($data) {
    $treks = $this->repository->getUpcomingTrips($data);
    return $treks;
  }
  public function getUpcomingExpeditions($data) {
    $treks = $this->repository->getUpcomingExpeditions($data);
    return $treks;
  }
  public function getUpcomingLeisureTrips($data) {
    $treks = $this->repository->getUpcomingLeisureTrips($data);
    return $treks;
  }
  public function getPopularTreks($data) {
    $treks = $this->repository->getPopularTreks($data);
    return $treks;
  }
  public function getPopularTrips($data) {
    $treks = $this->repository->getPopularTrips($data);
    return $treks;
  }
  public function getPopularExpeditions($data) {
    $treks = $this->repository->getPopularExpeditions($data);
    return $treks;
  }
  public function getPopularLeisureTrips($data) {
    $treks = $this->repository->getPopularLeisureTrips($data);
    return $treks;
  }
  public function getTravelExperts($data) {
    $experts = $this->repository->getTravelExperts($data);
    return $experts;
  }
  public function getTrekReviews($data) {
    $reviews = $this->repository->getTrekReviews($data);
    return $reviews;
  }
  public function getBlogArticles($data) {
    $blog = $this->repository->getBlogArticles($data);
    return $blog;
  }
  public function getSearchAllTreks($data) {
    $treks = $this->repository->getSearchAllTreks($data);
    return $treks;
  }
  public function getFilterAllTreks($data) {
    $treks = $this->repository->getFilterAllTreks($data);
    return $treks;
  }
  public function getTrekDetails($data) {
    $trek = $this->repository->getTrekDetails($data);
    return $trek;
  }
  public function addTrekReview($data) {
    $trek = $this->repository->addTrekReview($data);
    return $trek;
  }
  public function getSearchAllTrips($data) {
    $trips = $this->repository->getSearchAllTrips($data);
    return $trips;
  }
  public function getFilterAllTrips($data) {
    $trips = $this->repository->getFilterAllTrips($data);
    return $trips;
  }
  public function getTripDetails($data) {
    $trip = $this->repository->getTripDetails($data);
    return $trip;
  }
  public function addTripReview($data) {
    $trek = $this->repository->addTripReview($data);
    return $trek;
  }
  public function getSearchAllExpeditions($data) {
    $trips = $this->repository->getSearchAllExpeditions($data);
    return $trips;
  }
  public function getFilterAllExpeditions($data) {
    $trips = $this->repository->getFilterAllExpeditions($data);
    return $trips;
  }
  public function getExpeditionDetails($data) {
    $trip = $this->repository->getExpeditionDetails($data);
    return $trip;
  }
  public function addExpeditionReview($data) {
    $trek = $this->repository->addExpeditionReview($data);
    return $trek;
  }
  public function getLoginOtp($data) {
    $otp = $this->repository->getLoginOtp($data);
    return $otp;
  }
  public function getVerifyOtp($data) {
    $otp = $this->repository->getVerifyOtp($data);
    return $otp;
  }
  public function addUserDetails($data) {
    $user = $this->repository->addUserDetails($data);
    return $user;
  }
  public function updateUserDetails($data) {
    $user = $this->repository->updateUserDetails($data);
    return $user;
  }
  public function bookingProcess($data) {
    $booking = $this->repository->bookingProcess($data);
    return $booking;
  }
  public function getAllUserParticipantDetails($data) {
    $booking = $this->repository->getAllUserParticipantDetails($data);
    return $booking;
  }
  public function getEditTrekkerDetails($data) {
    $booking = $this->repository->getEditTrekkerDetails($data);
    return $booking;
  }
  public function updateUserParticipantDetails($data) {
    $booking = $this->repository->updateUserParticipantDetails($data);
    return $booking;
  }
  public function deleteUserParticipant($data) {
    $booking = $this->repository->deleteUserParticipant($data);
    return $booking;
  }
  public function getPaymentType() {
    $booking = $this->repository->getPaymentType();
    return $booking;
  }
  public function validatePromoCode($data) {
    $booking = $this->repository->validatePromoCode($data);
    return $booking;
  }
  public function proceedtoPay($data) {
    $booking = $this->repository->proceedtoPay($data);
    return $booking;
  }
  public function bookingSuccess($data) {
    $booking = $this->repository->bookingSuccess($data);
    return $booking;
  }
  public function sendSuccessRequestId($data) {
    $booking = $this->repository->sendSuccessRequestId($data);
    return $booking;
  }
  public function addBookingDetails($data) {
    $booking = $this->repository->addBookingDetails($data);
    return $booking;
  }
  public function paymentPage($data) {
    $booking = $this->repository->paymentPage($data);
    return $booking;
  }
  public function payBalanceAmount($data) {
    $booking = $this->repository->payBalanceAmount($data);
    return $booking;
  }
  public function getSuccessBookingDetails($data) {
    $booking = $this->repository->getSuccessBookingDetails($data);
    return $booking;
  }
  public function gmailLogin($data) {
    $user = $this->repository->gmailLogin($data);
    return $user;
  }
  public function addUserDetailsGmail($data) {
    $user = $this->repository->addUserDetailsGmail($data);
    return $user;
  }
  public function getDashboard($data) {
    $dashboard = $this->repository->getDashboard($data);
    return $dashboard;
  }
  public function resendOtp($data) {
    $otp = $this->repository->resendOtp($data);
    return $otp;
  }
  public function addUserParticipants($data) {
    $user = $this->repository->addUserParticipants($data);
    return $user;
  }
  public function aboutUsPage() {
    $about = $this->repository->aboutUsPage();
    return $about;
  }
  public function contactUsPage() {
    $about = $this->repository->contactUsPage();
    return $about;
  }
  public function submitContactUs($data) {
    $about = $this->repository->submitContactUs($data);
    return $about;
  }
  public function termsPrivacyPage() {
    $about = $this->repository->termsPrivacyPage();
    return $about;
  }
  public function medicalPage() {
    $about = $this->repository->medicalPage();
    return $about;
  }
  public function liabilitiesPage() {
    $about = $this->repository->liabilitiesPage();
    return $about;
  }
  public function testimonialsPage() {
    $about = $this->repository->testimonialsPage();
    return $about;
  }    
  public function getTransactionDetails($data) {
    $transaction = $this->repository->getTransactionDetails($data);
    return $transaction;
  }
  public function viewInvoice($data) {
    $transaction = $this->repository->viewInvoice($data);
    return $transaction;
  }
  public function getBDetails($data) {
    $transaction = $this->repository->getBDetails($data);
    return $transaction;
  }
  public function viewInvoiceBD($data) {
    $transaction = $this->repository->viewInvoiceBD($data);
    return $transaction;
  }
  /*
  Bike trips
  */
  public function tripBookingProcess($data) {
    $booking = $this->repository->tripBookingProcess($data);
    return $booking;
  }
  public function addTripBookingDetails($data) {
    $booking = $this->repository->addTripBookingDetails($data);
    return $booking;
  }
  public function tripPaymentPage($data) {
    $booking = $this->repository->tripPaymentPage($data);
    return $booking;
  }
  public function getTripTransactionDetails($data) {
    $transaction = $this->repository->getTripTransactionDetails($data);
    return $transaction;
  }
  public function viewTripInvoice($data) {
    $transaction = $this->repository->viewTripInvoice($data);
    return $transaction;
  }
  public function getTripBDetails($data) {
    $transaction = $this->repository->getTripBDetails($data);
    return $transaction;
  }
  public function viewTripInvoiceBD($data) {
    $transaction = $this->repository->viewTripInvoiceBD($data);
    return $transaction;
  }
  public function validateTripPromoCode($data) {
    $booking = $this->repository->validateTripPromoCode($data);
    return $booking;
  }
  public function proceedtoPayTrip($data) {
    $booking = $this->repository->proceedtoPayTrip($data);
    return $booking;
  }
  public function bookingSuccessTrip($data) {
    $booking = $this->repository->bookingSuccessTrip($data);
    return $booking;
  }
  public function sendSuccessRequestIdTrip($data) {
    $booking = $this->repository->sendSuccessRequestIdTrip($data);
    return $booking;
  }
  public function payBalanceAmountTrip($data) {
    $booking = $this->repository->payBalanceAmountTrip($data);
    return $booking;
  }
  public function getSuccessBookingDetailsTrip($data) {
    $booking = $this->repository->getSuccessBookingDetailsTrip($data);
    return $booking;
  }
  /* Expeditions */
  public function expeditionBookingProcess($data) {
    $booking = $this->repository->expeditionBookingProcess($data);
    return $booking;
  }
  public function addExpeditionBookingDetails($data) {
    $booking = $this->repository->addExpeditionBookingDetails($data);
    return $booking;
  }
  public function expeditionPaymentPage($data) {
    $booking = $this->repository->expeditionPaymentPage($data);
    return $booking;
  }
  public function getExpeditionTransactionDetails($data) {
    $transaction = $this->repository->getExpeditionTransactionDetails($data);
    return $transaction;
  }
  public function viewExpeditionInvoice($data) {
    $transaction = $this->repository->viewExpeditionInvoice($data);
    return $transaction;
  }
  public function getExpeditionBDetails($data) {
    $transaction = $this->repository->getExpeditionBDetails($data);
    return $transaction;
  }
  public function viewExpeditionInvoiceBD($data) {
    $transaction = $this->repository->viewExpeditionInvoiceBD($data);
    return $transaction;
  }
  public function validateExpeditionPromoCode($data) {
    $booking = $this->repository->validateExpeditionPromoCode($data);
    return $booking;
  }
  public function proceedtoPayExpedition($data) {
    $booking = $this->repository->proceedtoPayExpedition($data);
    return $booking;
  }
  public function bookingSuccessExpedition($data) {
    $booking = $this->repository->bookingSuccessExpedition($data);
    return $booking;
  }
  public function sendSuccessRequestIdExpedition($data) {
    $booking = $this->repository->sendSuccessRequestIdExpedition($data);
    return $booking;
  }
  public function payBalanceAmountExpedition($data) {
    $booking = $this->repository->payBalanceAmountExpedition($data);
    return $booking;
  }
  public function getSuccessBookingDetailsExpedition($data) {
    $booking = $this->repository->getSuccessBookingDetailsExpedition($data);
    return $booking;
  }
  public function getCelebrityTrips($data) {
    $trips = $this->repository->getCelebrityTrips($data);
    return $trips;
  }
  public function getCelebrityTripDetails($data) {
    $trips = $this->repository->getCelebrityTripDetails($data);
    return $trips;
  }
  public function addCelebrityTripEnquiry($data) {
    $trips = $this->repository->addCelebrityTripEnquiry($data);
    return $trips;
  }
  public function getSearchAllLeisureTrips($data) {
    $trips = $this->repository->getSearchAllLeisureTrips($data);
    return $trips;
  }
  public function getFilterAllLeisureTrips($data) {
    $trips = $this->repository->getFilterAllLeisureTrips($data);
    return $trips;
  }
  public function getLeisureTripDetails($data) {
    $trips = $this->repository->getLeisureTripDetails($data);
    return $trips;
  }
  public function addLeisureTripReview($data) {
    $trips = $this->repository->addLeisureTripReview($data);
    return $trips;
  }
  public function getSearchAllHostels($data) {
    $trips = $this->repository->getSearchAllHostels($data);
    return $trips;
  }
  public function getHostelDetails($data) {
    $trips = $this->repository->getHostelDetails($data);
    return $trips;
  }
  public function submitPartnerWithUs($data) {
    $partner = $this->repository->submitPartnerWithUs($data);
    return $partner;
  }
  public function lpBookingProcess($data) {
    $booking = $this->repository->lpBookingProcess($data);
    return $booking;
  }
  public function addLpBookingDetails($data) {
    $booking = $this->repository->addLpBookingDetails($data);
    return $booking;
  }
  public function lPpaymentPage($data) {
    $booking = $this->repository->lPpaymentPage($data);
    return $booking;
  }
  public function getLpTransactionDetails($data) {
    $transaction = $this->repository->getLpTransactionDetails($data);
    return $transaction;
  }
  public function viewLpInvoice($data) {
    $transaction = $this->repository->viewLpInvoice($data);
    return $transaction;
  }
  public function getLpBDetails($data) {
    $transaction = $this->repository->getLpBDetails($data);
    return $transaction;
  }
  public function viewLpInvoiceBD($data) {
    $transaction = $this->repository->viewLpInvoiceBD($data);
    return $transaction;
  }
  public function validateLpPromoCode($data) {
    $booking = $this->repository->validateLpPromoCode($data);
    return $booking;
  }
  public function proceedtoPayLp($data) {
    $booking = $this->repository->proceedtoPayLp($data);
    return $booking;
  }
  public function bookingSuccessLp($data) {
    $booking = $this->repository->bookingSuccessLp($data);
    return $booking;
  }
  public function sendSuccessRequestIdLp($data) {
    $booking = $this->repository->sendSuccessRequestIdLp($data);
    return $booking;
  }
  public function payBalanceAmountLp($data) {
    $booking = $this->repository->payBalanceAmountLp($data);
    return $booking;
  }
  public function getSuccessBookingDetailsLp($data) {
    $booking = $this->repository->getSuccessBookingDetailsLp($data);
    return $booking;
  }
  public function getBlogPageArticles($data) {
    $blog = $this->repository->getBlogPageArticles($data);
    return $blog;
  }
  public function getBlogPageCategories($data) {
    $blog = $this->repository->getBlogPageCategories($data);
    return $blog;
  } 
  public function getBlogPageArticleDetails($data) {
    $blog = $this->repository->getBlogPageArticleDetails($data);
    return $blog;
  }
  public function submitArticleComment($data) {
    $blog = $this->repository->submitArticleComment($data);
    return $blog;
  }
  public function getCategoryBlogArticles($data) {
    $blog = $this->repository->getCategoryBlogArticles($data);
    return $blog;
  }
  public function getBlogRecentPosts($data) {
    $blog = $this->repository->getBlogRecentPosts($data);
    return $blog;
  }
  public function getBlogUnkonwnPath($data) {
    $blog = $this->repository->getBlogUnkonwnPath($data);
    return $blog;
  }
  public function addUserWishlist($data) {
    $wishlist = $this->repository->addUserWishlist($data);
    return $wishlist;
  }
  public function getUserWishlist($data) {
    $wishlist = $this->repository->getUserWishlist($data);
    return $wishlist;
  }
  public function updateBatchDate($data) {
    $wishlist = $this->repository->updateBatchDate($data);
    return $wishlist;
  }
  public function getPaymentDetails($data) {
    $payment = $this->repository->getPaymentDetails($data);
    return $payment;
  }
  public function getTripPaymentDetails($data) {
    $payment = $this->repository->getTripPaymentDetails($data);
    return $payment;
  }
  public function getExpPaymentDetails($data) {
    $payment = $this->repository->getExpPaymentDetails($data);
    return $payment;
  }
  public function getLpPaymentDetails($data) {
    $payment = $this->repository->getLpPaymentDetails($data);
    return $payment;
  }
  public function addingTrekBackend($data) {
    $payment = $this->repository->addingTrekBackend($data);
    return $payment;
  }
  public function getPromoCodes() {
    $offers = $this->repository->getPromoCodes();
    return $offers;
  }
  public function addHostelBookingDetails($data) {
    $payment = $this->repository->addHostelBookingDetails($data);
    return $payment;
  }
  public function getListHotels($data) {
    $hotels = $this->repository->getListHotels($data);
    return $hotels;
  }
  public function getHotelDetails($data) {
    $hotels = $this->repository->getHotelDetails($data);
    return $hotels;
  }
  public function addHotelBooking($data) {
    $hotels = $this->repository->addHotelBooking($data);
    return $hotels;
  }
  public function processHotelBooking($data) {
    $hotels = $this->repository->processHotelBooking($data);
    return $hotels;
  }
  public function addQuoteDetails($data) {
    $quotes = $this->repository->addQuoteDetails($data);
    return $quotes;
  }
  public function getRegisterOtp($data){
    $otp = $this->repository->getRegisterOtp($data);
    return $otp;
  }
}