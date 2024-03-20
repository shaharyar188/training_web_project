@extends('layouts.app-user')
@section('main-content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Instruction & Tutorial</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url("/") }}">HOME</a></li>
                            <li><a href="{{ url("tutorial") }}">Instruction & Tutorial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-15.jpg") }}" alt="Banner"></a></div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="{{ url("/") }}"><img src="{{ asset("/user-assets/images/banner/banner-14.jpg") }}" alt="Banner"></a></div>
            </div>
        </div>
    </div>
    <div class="faq-section section mt-90 mb-40">
        <div class="container">
            <div class="row row-25">
                <div class="col-lg-12 col-12 mb-50">
                    <div class="faq-wrap">
                        <div class="row mb-30">
                            <div class="about-section-title col-12 mb-50">
                                <h3>Moving AliExpress Wishlist Items to Shopify via the DSers App (September 2023 Update).</h3>
                                <p>LOG INTO SHOPIFY, DSERS, and ALIEXPRESS:</p>
                            </div>
                            <div class="about-feature col-lg-12 col-12">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 1 :</h4>
                                        <p>Go to Shopify, Login, Click on Apps. Always have Shopify open when you're doing these steps or it may cause data errors when importing products</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 2:</h4>
                                        <p>Click on "DSers-AliExpress Dropshipping" App in Shopify on the Apps tab on the left. Do not try to log into DSers any other way as it will cause problems</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 3:</h4>
                                        <p>In a separate tab, open AliExpress, Login, go to Wishlist, start from the top item</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>ALI EXPRESS: Step 4</h4>
                                        <p>In AliExpess, click on the "Add to DSers" button</p>
                                        <b>TROUBLESHOOTING:</b>
                                        <p>if the DSers button is missing check the following:</p>
                                        <p>Make sure that the DSers Extension is added to your Google Chrome by clicking on the puzzle piece in the top right corner of your browser.
                                            You may need to click on the image of the product and scroll down to the Buy Now and Add to Cart button and use that "Add to DSers" button
                                            If neither of those work, then try adjusting the zoom settings on your browser by clicking the three stacked vertical dots in the top right corner and zooming in or out until you see the DSers button in the wishlist</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 5 :</h4>
                                        <p>A Pop Up will Appear, if it has a green checkmark then close it with the X</p>
                                        <p><b>TROUBLESHOOTING:</b>if something else occurs, read the message and follow the instructions; usually this means it's already been added or you may need to shut down your Shopify and DSers and try it again--steps 1-3 above</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 6A :</h4>
                                        <p>Open the DSers tab</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 6B :</h4>
                                        <p>Click on "Refresh / Reload" button on the top left of the screen</p>
                                    </div>    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 6C :</h4>
                                        <p>Click the Import List button on the left side of your screenbr</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 7 :</h4>
                                        <p>Click the "Filter" button in the top right of the screen</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 8 :</h4>
                                        <p>Under the "Filter by push" section, click the "Not Pushed to Shopify" button (or it may be labeled "No pushed to Store(s)", then click the "Confirm" button. This will make all the products you've already "pushed" to Shopify disappear, leaving only the products you need to do the remaining steps</p>
                                    </div>
                                    <div class="col-md-12 col-12 mb-30">
                                        <h4>DSers PRODUCT Adjustments:</h4>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 9:</h4>
                                        <p>Click on the "Split Products" button (or it may be labeled "Split into multiple products") on the bottom of the newly added product (it looks like a Y with some arrow tips)</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 10:</h4>
                                        <p>Split by Variant, United States, and the "Split" button</p>
                                        <h4>TROUBLESHOOTING:</h4>
                                        <p><b>A.</b> If there is no United States option or if there is no country listed then it's shipping from China and you want to delete this product and import a different product by closing out that tab, clicking the three dots on the bottom right of the product and selecting delete then also delete the product in your AliExpress wishlist</p>
                                        <p><b>B.</b> If the only option is United States then close out of this tab using the X in the top right corner of the pop-up and skip to step 13 below</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 11:</h4>
                                        <p>Click on OK (or "Confirm") button to split the product</p>
                                        <p><b>Reason: </b> We "split" products so that we can control where products are being shipped from. We want to have all our products shipped from the United States, as they will arrive to your clients faster than if they're sitting in a warehouse in China, or Russia, etc.</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 12:</h4>
                                        <p>There will now be two 2 versions of the product. The NEWEST one will be on the left side. We want to delete the OLD product on the right. Click on the three dots on the bottom right of the right product (the "More Options" button) and then click the "Delete" button option on the OLD version (the one on the right). Also click the "Confirm" pop up.</p>
                                        <p><b>TROUBLESHOOTING:</b> Make sure to delete any products that have less than 20 items in inventory (you can see that as the Stock and the number to the right)</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 14 :</h4>
                                        <p>Click on the "Description(s)" tab and confirm it's in English. If it is not, delete the item.</p>
                                        <p>DO NOT hit the Save button (yet)</p>
                                        <h4>OPTIONAL:</h4>
                                        <p>You can delete the line that says "Origin: Mainland China" if you want (be sure to delete the blank line this creates when it's deleted)</p>
                                    </div>
                                    <div class="col-md-12 col-12 mb-30">
                                        <h4>DSers IMAGES Tab of the Product:</h4>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 15 :</h4>
                                        <p> Click on the "Images" tab and choose what images you want. See below:</p>
                                        <p> KEEP each image that says "COVER" or "VARIANT"</p>
                                        <p> KEEP or ADD any images that show sizes or dimensions</p>
                                        <p> DO NOT ADD any images that talk about prices, shipping, ship times, show</p>
                                        <p> warehouse info, or talk about drop-shipping</p>
                                        <p> DO NOT ADD duplicate images that are not providing new information</p>
                                        <p> DO NOT ADD images that are not in English (if you can help it; sometimes there is no choice such as if it's a variant image that is in multiple languages)</p>
                                        <p> DO NOT hit the Save button (yet); instead scroll up and do the next step</p>
                                    </div>
                                    <div class="col-md-12 col-12 mb-30">
                                        <h4>DSers PRODUCT Tab of the Product::</h4>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 16 :</h4>
                                        <p> Click on the Product(s) tab and shorten the name to about 8 words Most likely you need to change the name to something shorter and in better English:</p>
                                        <p> KEEP the name short and concise (ideally about 8 words or so)</p>
                                        <p> DO NOT keep the brand name; when in doubt, delete it</p>
                                        <p> DO NOT keep the year</p>
                                        <p> DO NOT keep the item number or the size</p>
                                        <p> DO NOT have repetitive words</p>
                                        <p> <b>REMEMBER:</b> Shorter is better, almost always</p>
                                        <p> <b>OPTION:</b> If you're concerned about the details of the title being lost you can copy the title (or what parts of it you want) and put it in the Description tab, but make sure it's on it's own line, perhaps calling it: Details and then just copying what was on the title. That way you can rename it any way you want and not lose the information that you may feel is important.</p>
                                        <p> <b>REASON:</b> A concise title in good English is very important because we want it to be easily readable. The titles in AliExpress are written for keyword searches; your website isn't going to be searched like that (typically), so we want short and easy to read titles.</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 17A :</h4>
                                        <p>Choose the appropriate Collection by clicking on the square below the word "Collections" and scroll down to the appropriate Collection and click it</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 17B:</h4>
                                        <p>Click your cursor on the word "Collections" itself to "lock in" your choice (the scroll options will disappear). If you do not do this then the product will not be added to a Collection and will be nearly impossible for your clients to find</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 18:</h4>
                                        <p>Click on the "Save" button on the bottom right</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 19:</h4>
                                        <p>Hover your cursor over the product and then click on the orange circular "Push to Shopify" button (or it may be called "Push to Store") Do NOT click the rectangular Shopify button at the top of the screen please</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 20A:</h4>
                                        <p>Select the "Also publish to Online Store" checkbox on the pop up window If you do not do this then the product will not be added to your website, only to Shopify, and you clients won't be able to find it</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 20B:</h4>
                                        <p>Then click "Push to Shopify" button (or it may be called "Push to Stores")</p>
                                        <h4>TROUBLESHOOTING:</h4>
                                        <p>if an error comes up and it doesn't allow you to push this product to Shopify, most likely there are more than 100 variants and you'll need to either choose a different product or use steps 9-12 above, but maybe "split" out the products by color or size; for example, if it comes in lots of colors or sizes, then "split" the product doing all but one or two sizes or one or two colors, that way you'll have all but those few colors.</p>
                                        <h4>TROUBLESHOOTING:</h4>
                                        <p>if you had the filter applied (steps 7 & 8 above) and the product doesn't "disappear" when you push it to the store/Shopify, you do NOT need to delete the product in the Import List, instead just reapply the filter and it should disappear.</p>
                                    </div>
                                    <div class="col-md-12 col-12 mb-30">
                                        <h4>ALI EXPRESS:</h4>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 21A :</h4>
                                        <p>Go back to the AliExpress tab to the Wishlist and Click "Delete" on the product you just added</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 21B :</h4>
                                        <p>Click "Delete" on the Confirmation pop up</p>
                                    </div>
                                    <div class="col-md-6 col-12 mb-30">
                                        <h4>Step 21C :</h4>
                                        <p>Then hit "Refresh/Reload" on the page (top left) before adding the next product (steps 4-21 above) or it will add the previous product again. If you do not do this then the next time you click "Add to DSers" it will add the previous (seemingly deleted) product that you already did</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-30">
                                <div class="about-content-text item-column" style="margin-top:20px; ">
                                    <h6 style="font-size: 12px;" class="about-content-title">How to Add Items to your AliExpress Wishlist</h6>

                                    <div class="item-two-column">
                                        <div class="flat-video-fancybox">
                                            <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/cUDSUVU4TRY?si=XR1cFNVISOxfmE-l"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-30">

                                <div class="about-content-text item-column" style="margin-top:20px; ">
                                    <h6 class="about-content-title" style="font-size: 12px;">Moving AliExpress Wishlist Items to Shopify via the
                                        DSers App
                                    </h6>

                                    <div class="item-two-column">
                                        <div class="flat-video-fancybox">
                                            <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/TyliX9loMR8?si=F0IUx2k7Pmpx45kO"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.services-single-img -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
