  <template>
    <ion-menu content-id="main-content" side="start">    
      <ion-toolbar>
      <div class="profile-container">
       <ion-avatar class="profile-avatar2">
          <img :src="profileImage" alt="Profile-menu" class="profile-menu"/>
        </ion-avatar>
        <div class="menu-points-2" @click="navigateTo('loyaltypoints')">
        <img class="crown-icon2" src="@/assets/Fairytale.png" alt="Crown" />
        <span class="points-text2">{{ points }} Points</span>
        <ion-icon :icon="chevronForwardOutline" class="chevron-icon2"></ion-icon>
      </div>


    <ion-label class="profile-info">
      <h2>{{ username }} {{ lastname }}</h2>
      <p>{{ phoneNumber }}</p>
    </ion-label>
   </div>

      </ion-toolbar>
    <ion-content>
      <ion-list>
        <ion-item button @click="navigateTo('home')">
          <img  src="@/assets/logo.png" alt="Home Logo" class="menu-logo"  />
          <ion-label class="menu-label">Home</ion-label>
        </ion-item>

        <!-- npx cap sync android -->
         <!-- npx cap run android -->
         <!-- ionic capacitor run android -l --external -->

         <ion-item button @click="navigateTo('orders')">
          <ion-icon :icon="bagCheckSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">Order Now!</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('notification')">
          <ion-icon :icon="notificationsSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">Notifications</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('store')">
          <ion-icon :icon="storefrontSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">Store Locator</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('faq')">
          <ion-icon :icon="helpCircleSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">FAQ's</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('myorders')">
          <ion-icon :icon="bagHandleSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">My Orders</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('myaccount')">
          <ion-icon :icon="personSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">My Account</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('myfav')">
          <ion-icon :icon="heartSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">My Favorites</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('ordertrack')">
          <ion-icon :icon="locationSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">Order Tracker</ion-label>
        </ion-item>

        <ion-item button @click="navigateTo('orderhistory')">
          <ion-icon :icon="timeSharp" color="danger"></ion-icon>
          <ion-label class="menu-label">Order History</ion-label>
        </ion-item>

        <ion-button color="red" class="logout-btn" @click="logout">
        Logout
      </ion-button>
      </ion-list>
    </ion-content>
    </ion-menu>



    <ion-page id="main-content">
      <ion-header class="no-border">
        <ion-toolbar>
          <ion-buttons slot="start">
            <ion-menu-button class="menu-button"> 
              <ion-icon :icon="menuOutline" class="menu-icon"></ion-icon>
            </ion-menu-button>
          </ion-buttons>
          <ion-title>
            <div class="points-container" @click="navigateTo('loyaltypoints')" style="cursor: pointer;">
              <img class="crown-icon" src="@/assets/Fairytale.png" />
              <span class="points-text">{{ points }} Points</span>
              <ion-icon :icon="chevronForwardOutline" class="chevron-icon"></ion-icon>
            </div>
          </ion-title>
          <ion-buttons slot="end">
            <ion-avatar class="profile-avatar">
              <img :src="profileImage" alt="Profile" />
            </ion-avatar>
          </ion-buttons>
        </ion-toolbar>
      </ion-header>

      <ion-content>
        <div class="content-area">
          <img class="fastfood-logo" src="@/assets/logo.png" alt="Fast Food Logo" />
          <div class="greeting">
            <p class="greeting-small">Anneoyong, {{ username }}!</p>
            <h2 class="greeting-main">What do you want to eat?</h2>
          </div>

       
          <div class="search-container">
            <ion-icon :icon="searchOutline" class="search-icon"></ion-icon>
            <ion-input class="search-bar" v-model="searchQuery" placeholder="Try our new Steak Fries Veggies"></ion-input>
          </div>

       
          <div class="special-offers">
            <div class="special-header">
              <h3>Special Offers!</h3>
              <a href="#" class="view-all">View all ></a>
            </div>
            <div class="offers-container">
              <img src="@/assets/View_all.png" alt="Offer 1" class="offer-img" />
              <img src="@/assets/View_all.png" alt="Offer 2" class="offer-img" />
              <img src="@/assets/View_all.png" alt="Offer 3" class="offer-img" />
            </div>
          </div>

         
          <div class="category-section">
            <h3>Category</h3>
            <div class="category-container">
              <div class="category-item">
                <img src="@/assets/category-chicken-recipe.png" alt="Chicken Recipes" class="category-img" />
                <div class="category-label">Chicken <br />9 Recipes</div>
              </div>
              <div class="category-item">
                <img src="@/assets/category-seafoods-recipe.png" alt="Seafood Recipes" class="category-img" />
                <div class="category-label">Seafoods <br />6 Recipes</div>
              </div>
            </div>
          </div>

     
          <div class="whats-new-section">
            <h3>What's New?</h3>
            <img src="@/assets/What_new.png" alt="What's New" class="whats-new-img" />
          </div>

     
          <div class="most-popular-section">
            <h3>Most Popular</h3>
            <div class="popular-container">
              <div class="popular-card" v-for="(item, index) in popularItems" :key="index">
              <img :src="item.image" :alt="item.name" class="popular-img" />
                <div class="popular-info">
                  <h4 class="popular-title">{{ item.name }}</h4>
                  <p class="popular-category">{{ item.category }}</p>
                  <p class="popular-price">P {{ item.price }}</p>
                  <div class="popular-rating">
                    <ion-icon 
                      v-for="n in 5" 
                      :key="n" 
                      :icon="n <= Math.floor(item.rating) ? star : n - 0.5 === item.rating ? starHalf : starOutline"
                      class="star-icon">
                    </ion-icon>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ion-button expand="full" class="order-now-btn" mode="md" @click="navigateTo('orders')">
            Order Now!
          </ion-button>
        </div>
      </ion-content>
    </ion-page>
  </template>

<script>
import { defineComponent, ref, onMounted } from "vue";
import { 
  IonPage, IonHeader, IonToolbar, IonButtons, IonButton, IonTitle, IonAvatar, IonContent, IonIcon, IonInput, 
  IonMenu, IonMenuButton, IonList, IonItem 
} from "@ionic/vue";
import { menuOutline, trophyOutline, chevronForwardOutline, searchOutline, storefrontSharp, notificationsSharp, bagCheckSharp, helpCircleSharp, bagHandleSharp, personSharp, heartSharp, timeSharp } from "ionicons/icons";
import { star, starHalf, starOutline } from "ionicons/icons";
import {
  homeOutline,
  cartOutline,
  notificationsOutline,
  locationOutline,
  helpCircleOutline,
  documentTextOutline,
  personOutline,
  heartOutline,
  locationSharp,
  timeOutline,
  logOutOutline,
} from "ionicons/icons";

import "@/assets/styles/HomePage.css";
import axios from "axios";
import { useRouter } from "vue-router";

export default defineComponent({
  components: {
    IonPage,
    IonHeader,
    IonToolbar,
    IonButtons,
    IonButton,
    IonTitle,
    IonAvatar,
    IonContent,
    IonIcon,
    IonInput,
    IonMenu,
    IonMenuButton,
    IonList,
    IonItem,
  },
  setup() {
    const points = ref(0);
    const profileImage = ref("");
    const username = ref("");
    const lastname = ref("");
    const phoneNumber = ref("");
    const searchQuery = ref("");
    const popularItems = ref([]);
    const router = useRouter();
    

    const fetchUserData = async () => {
    try {
        const response = await axios.get("http://192.168.18.13/myproject/userData.php");
        console.log("User Data:", response.data);

        username.value = response.data.username;
        lastname.value = response.data.lastname;
        phoneNumber.value = response.data.phoneNumber;
        profileImage.value = response.data.profileImage;
        points.value = response.data.points;
    } catch (error) {
        console.error("Error fetching user data:", error);
    }
};

onMounted(fetchUserData);

    // Function to fetch popular items
    const fetchPopularItems = async () => {
        try {
          const response = await axios.get("http://192.168.18.13/myproject/popularItems.php");
          console.log("API Response:", response.data);
          popularItems.value = response.data;
        } catch (error) {
          console.error("Error fetching popular items:", error);
        }
      };

      
    onMounted(fetchPopularItems);

    const navigateTo = (page) => {
        console.log("Navigating to", page);
        window.location.href = `/${page}`; 
      };


    const logout = () => {
      console.log("Logging out");
    };

    return {
      points,
      profileImage,
      username,
      searchQuery,
      menuOutline,
      star,
      starHalf,
      starOutline,
      popularItems,
      trophyOutline,
      chevronForwardOutline,
      searchOutline,
      navigateTo,
      storefrontSharp,
      logout,
      homeOutline,
      cartOutline,
      notificationsOutline,
      locationOutline,
      helpCircleOutline,
      documentTextOutline,
      personSharp,
      heartSharp,
      locationSharp,
      timeSharp,
      logOutOutline,
      lastname,
      phoneNumber,
      notificationsSharp,
      bagCheckSharp,
      helpCircleSharp,
      bagHandleSharp
    };
  },
});
</script>

