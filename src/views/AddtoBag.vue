  <template>
    <ion-page>
      <ion-header>
        <ion-toolbar>
          <ion-buttons slot="start">
            <ion-back-button default-href="/orders"></ion-back-button>
          </ion-buttons>
          <ion-title><p class="item-category">{{ itemCategory }}</p></ion-title>
          <ion-buttons slot="end">
          <ion-button>
            <ion-icon :icon="bagHandleSharp" class="cart-icon" color="danger"></ion-icon>
          </ion-button>
        </ion-buttons>
        </ion-toolbar>
      </ion-header>

      <ion-content>
    <div class="item-container">
      <div class="image-card">
        <img :src="itemImage" :alt="itemName" class="item-image" />
        <ion-button fill="clear" class="heart-icon">
          <ion-icon :icon="heartOutline"></ion-icon>
        </ion-button>
      </div>

      <div class="item-details">
        <h2 class="item-name">{{ itemName }}</h2>
        <div class="item-rating">
          <ion-icon 
            v-for="n in 5" 
            :key="n" 
            :icon="n <= Math.floor(itemRating) ? star : n - 0.5 === itemRating ? starHalf : starOutline"
            class="star-icon">
          </ion-icon>
        </div>
        <p class="item-description">
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; 
          Nam eu aliquam ipsum, sed accumsan metus. Maecenas neque nunc, tincidunt nec dui ac, rutrum consectetur ligula.
        </p>
        <div class="price-quantity-container">
        <p class="item-price">P {{ itemPrice }}</p>

          <div class="quantity-container">
            <ion-button @click="decreaseQuantity" :disabled="quantity <= 1">-</ion-button>
            <span class="quantity">{{ quantity }}</span>
            <ion-button @click="increaseQuantity">+</ion-button>
          </div>
        </div>

        
      <div class="beverages-section">
        <h3 class="beverages-title">Beverages</h3>
        <ion-item class="beverage-dropdown" lines="none">
          <p class="choose-beverage">Choose Beverage</p>
          <ion-select v-model="selectedBeverage" interface="popover" class="beverage-select" placeholder="Coke">
            <ion-select-option v-for="beverage in beverages" :key="beverage" :value="beverage">
              {{ beverage }}
            </ion-select-option>
          </ion-select>
        </ion-item>
      </div>


          <div class="size-selection">
            <ion-button
              v-for="size in sizes"
              :key="size.value"
              :class="{ 'selected-size': selectedSize === size.value }"
              @click="selectedSize = size.value"
            >
              {{ size.label }}
            </ion-button>
          </div>



          <div class="addons-section">
        <h3 class="addons-title">Add-Ons</h3>
        <div v-for="addon in addons" :key="addon.name" class="addon-item">
          <div class="addon-info">
            <img :src="addon.image" :alt="addon.name" class="addon-image" />
            <div class="addon-details">
              <h4 class="addon-name">{{ addon.name }}</h4>
              <p class="addon-category">{{ addon.category }}</p>
              <p class="addon-price">P {{ addon.price }}</p>
            </div>
          </div>
          <div class="addon-actions">
            <ion-checkbox v-model="addon.selected" class="addon-checkbox"></ion-checkbox>

            <div class="addon-quantity" v-if="addon.selected">
              <ion-button @click="decreaseAddonQuantity(addon)" :disabled="addon.quantity <= 1">-</ion-button>
              <span class="quantity">{{ addon.quantity }}</span>
              <ion-button @click="increaseAddonQuantity(addon)">+</ion-button>
            </div>
          </div>
        </div>
      </div>

      <div class="add-to-bag-container">
        <ion-button expand="full" class="add-to-bag-btn" @click="addToBag">
          Add to Bag
        </ion-button>
      </div>

      <ion-modal 
  :is-open="showModal" 
  backdropDismiss="false" 
  cssClass="custom-modal" 
  @didDismiss="showModal = false"
>
  <ion-content class="ion-padding modal-container">
    <img src="/assets/Checkout.png" alt="Success" class="modal-image" />
    <h2 class="modal-title">Successfully Added!</h2>
    <p class="modal-text">What do you want to do now?</p>
    
    <ion-button expand="full" class="modal-button" @click="goToCheckout">
      Proceed to Checkout
    </ion-button>
    <ion-button fill="clear" class="modal-link" @click="showModal = false">
      Add More
    </ion-button>
  </ion-content>
</ion-modal>



      
      </div>
    </div>
  </ion-content>

    </ion-page>
  </template>

  <script>
  import { defineComponent, ref } from "vue";
  import { useRoute, useRouter } from "vue-router";
  import { 
    IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonButtons, IonButton, IonBackButton, IonIcon
  } from "@ionic/vue";
  import { bagHandleSharp, star, starHalf, starOutline, heartOutline } from "ionicons/icons";
  import axios from "axios";
  import "@/assets/styles/AddtoBag.css";


  export default defineComponent({
    components: {
      IonPage,
      IonHeader,
      IonToolbar,
      IonTitle,
      IonContent,
      IonButtons,
      IonButton,
      IonBackButton,
      IonIcon,
    },
    setup() {
      const route = useRoute();
      const router = useRouter();
      const showModal = ref(false);
      const itemName = ref(route.query.name || "Unknown Item");
      const itemImage = ref(route.query.image || "https://via.placeholder.com/150");
      const itemCategory = ref(route.query.category || "Unknown Category");
      const itemPrice = ref(route.query.price || "0");
      const itemRating = ref(route.query.rating || "0");
      const quantity = ref(1);
      const beverages = ref(["Coke", "Pepsi", "Sprite", "Juice"]);
      const selectedBeverage = ref("Coke"); 
          const sizes = ref([
        { label: "Regular", value: "regular" },
        { label: "Large", value: "large" },
        { label: "X-Large", value: "xlarge" }
      ]);
      const selectedSize = ref("regular");
      const addons = ref([
      { name: "Tomato Sauce", category: "Sauce", price: 49, image: "/assets/Sauce.png", quantity: 1, selected: true },
      { name: "White Rice", category: "Rice", price: 25, image: "src/assets/Rice.png", quantity: 1, selected: true }
    ]);

      const increaseQuantity = () => {
        quantity.value++;
      };

      const decreaseQuantity = () => {
        if (quantity.value > 1) {
          quantity.value--;
        }
      };

      const increaseAddonQuantity = (addon) => {
      addon.quantity++;
    };

    const decreaseAddonQuantity = (addon) => {
      if (addon.quantity > 1) {
        addon.quantity--;
      }
    };

    const addToBag = async () => {
    try {
      const response = await axios.post("http://192.168.18.13/myproject/addToBag.php", {
        name: itemName.value,
        category: itemCategory.value,
        price: itemPrice.value,
        quantity: quantity.value,
        image: itemImage.value
      });

      console.log("Add to Bag Response:", response.data);

      if (response.data.success) { 
        showModal.value = true;  // ✅ Ensure modal is updated reactively
      } else {
        console.error("Server Error:", response.data);
        alert("Failed to add item to bag: " + (response.data.message || "Unknown error"));
      }

    } catch (error) {
      console.error("Error adding to bag:", error.response ? error.response.data : error);
      alert("Network Error: Failed to add item to bag.");
    }
  };


  const goToCheckout = () => {
    showModal.value = false;
    router.push("/checkout");
  };

      return {
        sizes,
        selectedSize,
        itemName,
        itemImage,
        itemCategory,
        itemPrice,
        itemRating,
        quantity,
        increaseQuantity,
        decreaseQuantity,
        addToBag,
        star,
        starHalf,
        starOutline,
        bagHandleSharp,
        heartOutline,
        beverages,
        selectedBeverage,
        addons,
        increaseAddonQuantity,
        decreaseAddonQuantity,
        showModal,  // ✅ Add this to make it reactive in the template
        goToCheckout,
      };
    },
  });
  </script>