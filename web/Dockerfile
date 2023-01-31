##### BASE STEP ###########################################

FROM node:18-alpine AS base
RUN mkdir /app && chown node:node /app
WORKDIR /app
COPY --chown=node:node package*.json .npmrc ./
RUN npm ci
COPY --chown=node:node . .
EXPOSE 8000

##### DEV STEP ############################################

FROM base AS development
ENV PORT 8000
WORKDIR /app
USER node
CMD ["npm", "run", "dev"]

##### RUN STEP ############################################

FROM base AS production
ENV PORT 8000
WORKDIR /app
USER node
RUN npm run build
CMD ["npm", "start"]
